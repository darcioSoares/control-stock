import './bootstrap';

import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;

import mask from '@alpinejs/mask';
import collapse from '@alpinejs/collapse';

Alpine.plugin(mask);
Alpine.plugin(collapse)