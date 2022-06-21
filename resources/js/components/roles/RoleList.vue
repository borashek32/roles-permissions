<template>
  <div>
    <form
      @submit.prevent
      class="mb-4 w-full flex mt-4"
      >
      <input
        v-model="role.name"
        class="p-4 mr-0 w-full border text-gray-800 border-gray-200 bg-white"
        placeholder="Enter name of a new role"
        />
      <app-validation-errors
        v-if="validationErrors"
        :errors="validationErrors"
        ></app-validation-errors>

      <button
        @click="addRole"
        class="update_role px-8 bg-yellow-400 text-gray-800 font-bold p-4 uppercase border-yellow-500 border">
        Create
      </button>
    </form>


    <div
      v-if="errored"
      class="bg-red-100 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert"
      >
      <div class="flex">
          <div>
              <p class="text-sm">Oops:( Roles can't be loaded now. Please, try later</p>
          </div>
      </div>
    </div>

    <table
      v-else
      class="w-full rounded text-sm text-left text-gray-500 dark:text-gray-400"
      >
      <div v-if="loading">Loading...</div>
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="p-4">
            <div class="flex items-center">
              <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="checkbox-all-search" class="sr-only">checkbox</label>
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            Name
          </th>
          <th scope="col" class="px-6 py-3">
            Users
          </th>
          <th scope="col" class="px-6 py-3">
            Permissions
          </th>
          <th scope="col" class="px-6 py-3">
            Created at
          </th>
          <th scope="col" class="px-6 py-3">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="role in roles"
          :key="role.id"
          :role="role"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="w-4 p-4">
            <div class="flex items-center">
              <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
            </div>
          </td>
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            {{ role.name }}
          </th>
          <td class="px-6 py-4">
            #
          </td>
          <td class="px-6 py-4">
            #
          </td>
          <td class="px-6 py-4">
            {{ role.created_at }}
          </td>
          <td class="px-6 py-4 flex flex-row">
            <button class="edit_role focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">
              Edit
            </button>

            <button
              @click="deleteRole(role.id)"
              class="focus:outline-none ml-2 rounded-lg bg-gray-800 py-3 px-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900"
              >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      roles: [],
      role: {
        id: '',
        name: ''
      },
      edit: false,
      loading: true,
      errored: false,
      validationErrors: ''
    }
  },
  mounted: function() {
    this.getRoles()
  },
  methods: {
    getRoles() {
      setTimeout(() => {
        axios
          .get(`/admin/roles`)
          .then(response => {
            if(response.status == 200) {
              this.roles = response.data.roles.data
              this.loading = false
            }
          })
          .catch(error => {
            this.errored = true
          })
          .finally(() => this.loading = false)
      }, 1000)
    },
    deleteRole(id) {
      axios
        .delete(`/admin/roles/${id}`)
        .then(response => {
          if(response.status == 200) {
            this.getRoles()
            Swal.fire({
              icon: 'success',
              title: 'Ok',
              text: response.data.message
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: error.data.error
            })
          }
        })
    },
    addRole() {
      if(this.edit === false) {
        axios
          .post(`/admin/roles`, {
            name: this.role.name
          })
          .then(response => {
            if(response.status == 200) {
              console.log(response.status);
              this.roles.name = ''
              this.getRoles()
              Swal.fire({
                icon: 'success',
                title: 'Ok',
                text: response.data.message
              })
            }
          })
          .catch(error => {
            if(error.response.status == 422) {
              this.errored = true
              this.getRoles()
              console.log(error.response.data.message);
              this.validationErrors = error.response.data.message
            }
            if (error.response.status == 500) {
              console.log(error.response.data.message);
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.response.data.message
              })
            }
          })
          .finally(() => this.loading = false)
      } else {

      }
    }
  }
}
</script>
