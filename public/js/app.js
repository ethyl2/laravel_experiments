//const { default: Axios } = require("axios")

new Vue({
  template: `
  <div>
    <h1>Skills</h1>
    <ul>
      <li v-for="skill in skills" :key="skill">{{ skill }}</li>
    </ul>
  </div>`,
  el: '#root',
  data: {
    skills: []
  },
  mounted() {
    // Make an ajax request to our server to get skills.
    axios.get('/skills')
      .then(response => {
        console.log(response.data);
        this.skills = response.data;
      })
      .catch(err => console.log(err));
  }
})


