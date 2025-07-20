import './bootstrap';
import { sinNumeros, soloNumeros } from './validaciones';


// Para que se pueda usar sinNumeros() en el HTML con oninput
window.sinNumeros = sinNumeros;
window.soloNumeros = soloNumeros;
