<div class="content-wrapper">
	<section class="content-header">
		<h1>IBF API Services <small>Share data</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'doc';?>"><i class="fa fa-home"></i> Home</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp; API Service</h3>
				<div class="box-tools pull-right">
					<button class="btn" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- auth -->
				<section id="auth">
					<h2><a href="#auth">Member Autentifikasi</a></h2>
					<p class="lead">Untuk setiap aplikasi yang dikembangkan yang memerlukan authentifikasi member Ilmu Berbagi, maka gunakan API ini sebagai autentifikasi:</p>
					<h3>URL:</h3>
					<table class="table table-striped">
					<tr>
						<th>Method</th>
						<th>URL</th>
					</tr>
					<tr>
						<td>POST</th>
						<td>http://services.ilmuberbagi.id/auth/user</td>
					</tr>
					</table>
					<h3>Parameter:</h3>
					<table class="table table-striped">
					<tr>
						<th>Variable</th>
						<th>Type</th>
						<th>Values</th>
						<th>Keterangan</th>
					</tr>
					<tr>
						<td>api_kode</th>
						<td>Int/Number</th>
						<td>1000</td>
						<td>Set by request</td>
					</tr>
					<tr>
						<td>api_datapost</th>
						<td>array</td>
						<td><code>array($username,$password)</code></td>
						<td></td>
					</tr>
					</table>
					<h3>Sample Request: [PHP]</h3>
					<pre><code>
	&lt;?php
		define('AUTH_API_URL','http://services.ilmuberbagi.id/auth/user');
		$postdata = http_build_query(array('api_kode' => 1000, 'api_datapost' => array('sabbana', 'basmallah')));
		$param = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			));
		$context  = stream_context_create($param);
		$user = file_get_contents(AUTH_API_URL, false, $context);
		echo $user;
	?>
					</code>
					</pre>
					<h3>Response:</h3>
					<pre>
[

    {
        "member_id":"122",
        "member_name":"Sabbana Azmi",
        "member_email":"sabbana.a7@gmail.com",
        "member_username":"sabbana",
        "member_password":"02dfef23cb267ed2bad8dbcf61493ef5",
        "member_ibf_code":"IBF1402122",
        "member_status":"1",
        "member_type":null,
        "member_image_profile":"http:\/\/portal.ilmuberbagi.id\/assets\/img\/foto\/IB_eadabe5bc2664563cac96e165f84783d93e2d2a4.jpg"
    }

]						
					</pre>
				</section>
		</div>
	</section>
</div>