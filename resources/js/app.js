import '../sass/app.scss';

import './bootstrap';
import './custom';
import '@lottiefiles/lottie-player';


import Swiper from 'swiper';
import 'swiper/css';
const swiper = new Swiper();
export default Swiper;


import AOS from 'aos';
import 'aos/dist/aos.css'; 
AOS.init();