/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import './bootstrap';

// any CSS you import will output into a single css file (app.css in this case)
//import './vendor/fonts/boxicons.css';
import './vendor/fonts/boxicons.css'
import './vendor/css/core.css';
import './vendor/css/theme-default.css';
import './css/demo.css';
import './vendor/libs/perfect-scrollbar/perfect-scrollbar.css';
import './vendor/libs/apex-charts/apex-charts.css';

import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './vendor/js/helpers.js';