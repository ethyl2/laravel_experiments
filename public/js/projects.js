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
   * @param { string } field
   */
  get(field) {
    if (this.errors[field]) {
      return this.errors[field][0];
    }
  }

  /**
   * Update the errors.
   *
   * @param { object } errors
   */
  record(errors) {
    this.errors = errors;
  }

  /**
   * Clear one field (if given) or all fields.
   *
   * @param {string} field
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
   * @param { *string } field
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
   * @param { object } data
   */
  constructor(data) {
    this.originalData = data;

    for (let field in data) {
      this[field] = data[field]
    }
    this.errors = new Errors();
  }

  /**
   * Resets all fields in the Form instance.
   */
  reset() {
    for (let field in originalData) {
      this[field] = '';
    }
  }

  /**
   * Returns all of the relevant data needed for submission (and omits the irrelevant data).
   */
  data() {
    let data = Object.assign({}, this);
    delete data.originalData;
    delete data.errors;
    return data;
  }

  /**
   * Handles the submission
   *
   * @param { string } method
   * @param { *string } route
   */
  submit(method, route) {
    axios[method](route,
        this.data())
        .then(this.onSuccess.bind(this))
        .catch(this.onFail.bind(this));
  }

  /**
   * Handles a successful response.
   * TODO: Complete functionality to add to db.
   * @param { object } response
   */
  onSuccess(response) {
    alert(response.data.message);
    this.reset();
    this.errors.clear();
  }

  /**
   * Handles an error that results from an unsuccessful submission.
   *
   * @param { object } error
   */
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
