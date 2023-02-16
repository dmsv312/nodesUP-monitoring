<template>
  <div>
    <code>
      {{ migrations }}
    </code>
  </div>
  <div>
    {{ migrationResult }}
  </div>
  <div>
    <el-button @click="migrate">Migrate</el-button>
  </div>
  <div>
    <el-button @click="rollback">Rollback</el-button>
  </div>
  <div>
    <el-button @click="logout">Logout</el-button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "migrate-info",
  components: {

  },
  mounted() {
    this.fetchAllMigrations();
  },
  methods: {
    logout() {
      axios.post('/api/v1/logout').then(response => {
        console.log(response);
        this.removeToken();
        this.$router.push({ name: 'login' });
      }).catch(error => {
        console.log(error)
      });
    },
    removeToken() {
      localStorage.removeItem('token');
      localStorage.removeItem('role');
      this.$store.commit('setToken', '');
      this.$store.commit('setIsAuth', false);
      this.$store.commit('setRole', '');
    },
    fetchAllMigrations() {
      axios.get('/api/v1/migrations')
          .then(response => {
            console.log(response.data);
            this.migrations = response.data.output;
          }).catch(error => {
        console.log(error)
      });
    },
    migrate() {
      axios.post('/api/v1/migrate')
          .then(response => {
            console.log(response.data);
            this.migrationResult = response.data.output;
            this.fetchAllMigrations();
          }).catch(error => {
        console.log(error)
      });
    },
    rollback() {
      axios.post('/api/v1/rollback')
          .then(response => {
            console.log(response.data);
            this.migrationResult = response.data.output;
            this.fetchAllMigrations();
          }).catch(error => {
        console.log(error)
      });
    },
  },
  data() {
    return {
      migrations: [],
      migrationResult: '',
    };
  },
}
</script>

<style scoped>

</style>