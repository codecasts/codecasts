

// Bootstrap the Application Scripts
require('./bootstrap');

// Loads the Lessons Search Component
import LessonsSearch from './components/lessons-search.vue';

// Start a Vue "app"
const app = new Vue({
    el: 'body',
    components: { LessonsSearch },
});

// Load the Suggestions script
require('./suggestions');
