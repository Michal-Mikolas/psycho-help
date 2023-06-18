<?php

function nice_dt($dt) {
	$dt_str = $dt->format('Y-m-d H:i:s');

	if ($dt_str >= date('Y-m-d')) {
		return $dt->format('H:i');
	}

	if ($dt_str >= date('Y-m-d', strtotime('-1 day'))) {
		return 'Yesterday ' . $dt->format('H:i');
	}

	if ($dt_str >= date('Y')) {
		return $dt->format('d.m. H:i');
	}

	return $dt->format('d.m.Y H:i');
}
