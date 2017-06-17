	


	<?php $__env->startSection('content'); ?>
	
	
	
				
			
							
					<div class="container" >		
					
						<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
						
					<?php if(Session::has('message')): ?>
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo e(Session::get('message')); ?>

					</div>
					<?php endif; ?>
					<?php if(Session::has('error')): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo e(Session::get('error')); ?>

					</div>
					<?php endif; ?>

			

						<?php $user = DB::table('users')->join('personas','personas.email','=','users.email')
						 								->where('users.email','=', Auth::user()->email)
														->select('personas.creditoDisponible')
														->get()?>

						
						<div class="col-md-12" align = "center">
						<div class="panel panel-info" style=" border-color:#5cb85c;" >
							<div class="panel-heading " style="background-color:#5cb85c; border-color:#5cb85c;">
								<h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">¡¿ Cómo Jugar ?!</font></h4>
							</div>
						<div class="panel-body" style="padding:0px;">
						
						


		
		<div class="col-md-12" align = "center" style="padding-right: 0px; padding-left: 0px;">
		<div class="table-responsive" style="width:100%">
  		<table class="table">
		
		<thead>
		<tr align="center" class="info">
		</tr>
		</thead>

							

				<tbody align="center">
				<td>
					<div class = "container">
						
						<div class="col-md-12">
							
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
								    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
								    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								      <img src="../images/paso1.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>
								    <div class="item">
								      <img src="../images/paso2.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso3.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso4.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso5.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso6.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso7.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>

								    <div class="item">
								      <img src="../images/paso8.png" alt="..." class="img-responsive">
								      <div class="carousel-caption hidden-xs hidden-sm">
								        
								      </div>
								    </div>
								    
								  </div>
							</div>
						</div>

						<!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
					</div>
					

	
				</td>
				</tbody>

			
		
		</table>
</div>
</div>
</div>
</div>
</div>
		
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>
    $('.carousel').carousel({
  interval: 7000
})

     $('.carousel').carousel('cycle')
</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>