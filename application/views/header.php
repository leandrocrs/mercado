<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" href=<?=base_url("css/bootstrap.css")?> />
	<meta charset="utf-8" />
</head>
<body>
	<div class="container">
		<?php if($this->session->flashdata("success")) : ?>
		<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>
		<?php if($this->session->flashdata("error")) : ?>
		<p class="alert alert-danger"><?= $this->session->flashdata("error") ?></p>
		<?php endif ?>
		<?php if($this->session->flashdata("warning")) : ?>	
		<p class="alert alert-warning"><?= $this->session->flashdata("warning") ?></p>
		<?php endif ?>	
		<?php if($this->session->flashdata("info")) : ?>
		<p class="alert alert-info"><?= $this->session->flashdata("info") ?></p>
		<?php endif ?>