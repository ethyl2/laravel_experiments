<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
  <style>
            body {
                padding-left: 2em;
            }
        </style>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body>
  <div id='app' class='container'>


    <form method="POST" action='/projects' @submit.prevent="onSubmit" @keydown="form.errors.clear('$event.target.name)">
      <div class="control">
       <label for="name" class="label">Project Name:</label>
        <input type="text" id="name" class="input" v-model="form.name" />
        <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
      </div>

      <div class="control">
       <label for="name" class="label">Project Description:</label>
        <input type="text" id="description" class="input" v-model="form.description"/>
        <span class="help is-danger"  v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
      </div>

      <div class="control mt-4">
            <button class="button is-primary"> :disabled="form.errors.any" Create</button>
      </div>


      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src='projects.js'></script>
</body>
</html>
