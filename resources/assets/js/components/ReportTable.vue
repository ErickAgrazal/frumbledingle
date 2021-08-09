<template>
  <div>
    <form @submit.prevent="generateReport">
      <div class="create-form input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Price</span>
        </div>
        <input
          v-model="reportPrice"
          type="text"
          class="form-control"
          placeholder="Report price"
        />
        <div class="input-group-append">
          <button class="btn btn-primary">Generate</button>
        </div>
      </div>
    </form>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <th>Location</th>
        <th>Parent Category</th>
        <th>Category</th>
        <th>Count</th>
      </thead>
      <tbody>
        <tr v-for="(row, index) in report" :key="`report-${index}`">
          <td>{{ row.location }}</td>
          <td>{{ row.parent_category }}</td>
          <td>{{ row.category }}</td>
          <td>{{ row.count }}</td>
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
      report: [],
      reportPrice: "",
    };
  },
  mounted() {
    this.generateReport();
  },
  methods: {
    generateReport() {
      return axios
        .get(`/api/report/?price=${this.reportPrice}`)
        .then((response) => {
          this.report = response.data;
        })
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