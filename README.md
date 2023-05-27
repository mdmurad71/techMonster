how to install the project

1. clone the github link
2.  run composer install
3. php artisan generete:key
4. npm install
5. php artisan serve


what i used in this project

1. install a laravel project with command composer create-project laravel/laravel app "8.*".

2. Install Vue 3 npm install --save vue@next && npm install --save-dev vue-loader@next

3. Open webpack.mix.js and add .vue() the method as I added in the below code:

  
 4. const mix = require('laravel-mix');
   mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
   
5. Open resources/js/app.js and update the following code into that file:
require('./bootstrap');




6. import { createApp } from 'vue';
import router from './routes';

import User from './Helper/User';
window.User = User



const app = createApp({})

app.use(router)

app.mount('#app')
7. make a file route.js all component import there

8. run the command

9. npm i vue-router@next
10. go to resource/views/welcome.blade.php and set there
        <div id="app">
           
               <router-view/>
           </div>

           <script src="{{ mix('js/app.js') }}"></script>

11. npm run watch

12. run the project
13. php artisan serve
