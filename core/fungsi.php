<?php
function f($x){
	return (1+($x*pow(exp(1), -$x)));
}

function g($x) {
 	return ($x+(pow(exp(1), $x)));
}

function h($x) {
	//x^2 - (x+1) * e^-x
	return (pow($x, 2)-6*$x+8);
	//return (pow($x, 2) - ($x+1) * pow(exp(1), -$x));
}

//Fungsi Khusus untuk metode iterasi sederhana
function f_iterasi_sederhana($x) {
	return ($x+(pow(exp(1), $x)));
}

function g_iterasi_sederhana($x) {
	return (-pow(exp(1), $x));
}

function f_iterasi_sederhana_2($x) {
	return (exp($x)+pow($x, 2)-(3*$x)-2);
}

function g_iterasi_sederhana_2($x) {
	//x^2+e^x
	return ((pow($x, 2)+exp($x) - 2)/3);
}
//Batas akhir Fungsi Khusus untuk metode iterasi sederhana

//Fungsi yang digunakan untuk metode Newton Raphson
function f_nr($x) {
	//x-e^-x
	return ($x-(pow(exp(1), -$x)));
}

function f_aksen_nr($x) { //F_aksen
	//1+e^-x
	return (1+(pow(exp(1), -$x)));
}

function f_nr_2($x) {
	//4x^3-15x^2+17x-6
	return (4*pow($x, 3)-(15*pow($x, 2))+(17*$x)-6);
}

function f_aksen_nr_2($x) { //F_aksen
	//12x^2-30x+17
	return (12*pow($x, 2)-(30*$x)+17);
}
//Batas Fungsi yang digunakan untuk metode Newton Raphson

//Fungsi untuk metode secant
function f_secant($x) {
	//x^2 - (x+1) * e^-x
	return (pow($x, 2) - ($x+1) * pow(exp(1), -$x));
}

function f_secant_2($x) {
	//e^x - 5x^2
	return (pow(exp(1), $x) - 5 * pow($x, 2));
}

function f_secant_3($x) {
	//x³-e^x+2x
	return (pow($x, 2)-pow(exp(1), $x)+2*$x);
}