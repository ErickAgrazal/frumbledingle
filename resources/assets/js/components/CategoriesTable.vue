<template>
  <div>
    <form @submit.prevent="createCategory">
      <div class="create-form input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Name</span>
        </div>
        <input
          v-model="newCategoryName"
          type="text"
          class="form-control"
          placeholder="Category Name"
        />
        <select class="custom-select" v-model="newCategoryParent">
          <option value="" disabled selected>Select a parent category</option>
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
          >
            {{ category.name }}
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-primary">Create</button>
        </div>
      </div>
    </form>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <tr v-for="row in categories" :key="row.id">
          <td>{{ row.id }}</td>
          <td>{{ row.name }}</td>
          <td v-if="row.parent">
            {{ row.parent.name }} (Id: {{ row.parent.id }})
          </td>
          <td v-else></td>
          <td align="center">
            <button
              class="btn btn-danger btn-sm"
              @click.prevent="deleteCategory(row.id)"
            >
              <i class="fa fa-times" /> Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      categories: [],
      newCategoryName: "",
      newCategoryParent: "",
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      return axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data;
        })
        .catch(console.error);
    },
    createCategory() {
      return axios
        .post("/api/categories", {
          name: this.newCategoryName,
          parent: this.newCategoryParent,
        })
        .then(this.getCategories)
        .then(() => {
          this.newCategoryName = "";
          this.newCategoryParent = "";
        })
        .catch(console.error);
    },
    deleteCategory(id) {
      return axios
        .post("/api/categories/" + id, { _method: "DELETE" })
        .then(this.getCategories)
        .catch(console.error);
    },
  },
};
</script>

<style>
.create-form {
  margin-bottom: 10px;
}
</style>