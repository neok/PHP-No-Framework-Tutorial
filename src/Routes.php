<?php
return [
	['GET', '/', ['Project\Controllers\Homepage', 'show']],
	['GET', '/{parameter}', ['Project\Controllers\Page', 'show']]
];