export function sinNumeros(input) {
  input.value = input.value.replace(/[0-9]/g, '');
}
export function soloNumeros(input) {
  input.value = input.value.replace(/[^0-9]/g, '');
}