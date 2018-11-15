
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  Cascos
        <small>Registro historico.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Cascos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
 


 <div class="row">
<form class="col-md-12 card">


<div class="row">

<!-- Dede-->
<div class="col-md-4 ">
<div class="form-group">

    <input type="date" class="form-control" id="fechaInicio" required min="2018-01-01">
    <label>Desde</label>
  </div>
</div>
   <!--Fin desde -->


<!-- Dede-->
<div class="col-md-4 ">
<div class="form-group">

    <input type="date" class="form-control" id="fechaFinal"  required min="2018-01-01">
    <label>Hasta</label>

  </div>
</div>
   <!--Fin Hasta -->
   <!-- Dede-->
<div class="col-md-4 ">

  <div class="form-group">
    <input type="submit" class="form-control" value="Filtrar">
  </div>
</div>
   <!--Fin Hasta -->

</div>


 </div>


<form class="col-md-12">
<table class="table table-dark" id="tablaCascos">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marca y Modelo</th>
             <th scope="col">Serie</th> 
            <th scope="col">Observación</th> 
            <th scope="col">Estado</th>
             <th scope="col">Fecha Registro</th>
             
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        
 
   
        </tbody>
      </table>

</div>

    </section>
    <!-- /.content -->
  </div>

