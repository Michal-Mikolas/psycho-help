/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/**/*.{blade.php,css}"
	],
	theme: {
		extend: {},
	},
	plugins: [require("daisyui")],
}
