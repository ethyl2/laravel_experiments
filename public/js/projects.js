class Errors {
  /**
   * Create a new Errors instance.
   */
  constructor() {
    this.errors = {};
  }

  /**
   * Retrieve the error message for a field.
   *
   * @param {} field
   */
  get(field) {
    if (this.errors[field]) {
      return this.errors[field][0];
    }
  }

  /**
   * Update the errors.
   *
   * @param {} errors
   */
  record(errors) {
    this.errors = errors;
  }

  /**
   * Clear one field (if given) or all fields.
   *
   * @param {} field
   */
  clear(field) {
    if (field) {
    newErrors = this.errors.filter(key => key !== field);
    this.errors = newErrors;
    // Another way:
    //delete this.errors[field];
    } else {
      this.errors = {};
    }
  }

  /**
   * Determine if an errors exists for the given field
   *
   * @param {*} field
   */
  has(field) {
    //return !!this.errors[field];
    return this.errors.hasOwnProperty(field);
  }

  /**
   * Determine if we have any errors. Returns a boolean.
   */
  any() {
    return Object.keys(this.errors).length > 0;
  }
}

class Form {
  /**
   * Create a new Form instance
   * @param {
   * } data
   */
  constructor(data) {
    this.originalData = data;

    for (let field in data) {
      this[field] = data[field]
    }
    this.errors = new Errors();
  }

  reset() {
    for (let field in originalData) {
      this[field] = '';
    }
  }

  data() {
    let data = Object.assign({}, this);
    delete data.originalData;
    delete data.errors;
    return data;
  }

  submit(method, route) {
    //axios
    axios[method](route,
        this.data())
        .then(this.onSuccess.bind(this))
        .catch(this.onFail.bind(this));
  }

  onSuccess(response) {
    alert(response.data.message);
    this.reset();
    this.errors.clear();
  }

  onFail(error) {
    this.errors.record(error.response.data);
  }

}


new Vue({
  el: '#app',
  data() {
    return {
      form: new Form({
        name: '',
        description: ''
      }),
    }

  },
  methods: {
    onSubmit() {
      this.form.submit('post', '/projects');
    },
  }
});