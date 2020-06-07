<?php
function fungsi($x) {
	//e^-x.sin(2x)+1
	return (pow(exp(1), -$x)*sin(2*$x)+1);
}

function f_eksak($x) {
	return (-exp(-$x)*sin(2*$x)+exp(-$x)*2*cos(2*$x));
}

function selisih_maju($x, $h) {
	return ( fungsi($x+$h) - fungsi($x) / ($h));
}

function selisih_tengah($x, $h) {
	return ( (fungsi($x+$h) - fungsi($x-$h)) / (2*$h));
}

function selisih_mundur($x, $h) {
	return ( fungsi($x) - fungsi($x-$h) / ($h));
}