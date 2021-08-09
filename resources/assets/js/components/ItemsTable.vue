<template>
  <div>
    <form @submit.prevent="createItem">
      <div class="create-form input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Name</span>
        </div>
        <input
          v-model="newItemName"
          type="text"
          class="form-control"
          placeholder="Item Name"
        />
        <input
          v-model="newItemPrice"
          type="text"
          class="form-control"
          placeholder="Item Price"
        />
        <select class="custom-select" v-model="newItemCategory">
          <option value="" disabled selected>Select a category</option>
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
          >
            {{ category.name }}
          </option>
        </select>
        <select class="custom-select" v-model="newItemLocation">
          <option value="" disabled selected>Select a location</option>
          <option
            v-for="location in locations"
            :key="location.id"
            :value="location.id"
          >
            {{ location.name }}
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
        <th>Price</th>
        <th>Category</th>
        <th>Location</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <tr v-for="row in items" :key="row.id">
          <td>{{ row.id }}</td>
          <td>{{ row.name }}</td>
          <td>{{ row.price }}</td>
          <td v-if="row.category">
            {{ row.category.name }} (Id: {{ row.category.id }})
          </td>
          <td v-else></td>
          <td v-if="row.location">
            {{ row.location.name }} (Id: {{ row.location.id }})
          </td>
          <td v-else></td>
          <td align="center">
            <button
              class="btn btn-danger btn-sm"
              @click.prevent="deleteItem(row.id)"
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
      items: [],
      categories: [],
      locations: [],
      newItemName: "",
      newItemPrice: "",
      newItemCategory: "",
      newItemLocation: "",
    };
  },
  mounted() {
    this.getItems();
    this.getCategories();
    this.getLocations();
  },
  methods: {
    getItems() {
      return axios
        .get("/api/items")
        .then((response) => {
          this.items = response.data;
        })
        .catch(console.error);
    },
    getLocations() {
      return axios
        .get("/api/locations")
        .then((response) => {
          this.locations = response.data;
        })
        .catch(console.error);
    },
    getCategories() {
      return axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data;
        })
        .catch(console.error);
    },
    createItem() {
      return axios
        .post("/api/items", {
          name: this.newItemName,
          price: this.newItemPrice,
          location: this.newItemLocation,
          category: this.newItemCategory,
        })
        .then(this.getItems)
        .then(() => {
          this.newItemName = "";
          this.newItemPrice = "";
          this.newItemLocation = "";
          this.newItemCategory = "";
        })
        .catch(console.error);
    },
    deleteItem(id) {
      return axios
        .post("/api/items/" + id, { _method: "DELETE" })
        .then(this.getItems)
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