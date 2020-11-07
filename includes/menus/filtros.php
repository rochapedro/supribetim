<?php 

    if($_SESSION['is_admin'] == 1) {

        echo '
            <div class="form-group col-md-4">
                <label for="validationCustom05">Comum</label>
                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="id_casa" id="id_casa" >
                    <option value="">Selecione uma comum</option>
                    
                      '; echo CasasController::getOptionsCasas(); echo'
                   
                </select>
            </div>  
            <div class="form-group col-md-3">
                <label for="inputName">Data Inicial</label>          
                <input type="hidden" name="filter" value="1">      
                <input class="form-control" type="date"  id="data_inicial" preloa name="data_inicial">    
            </div>
            <div class="form-group col-md-3">
                <label for="inputName">Data Final</label>                
                <input class="form-control" type="date"  id="data_final" name="data_final">    
            </div>
            <div class="col-md-2" style="float:right;">
                <button type="submit" class="btn btn-primary filtrar">Filtrar</button> 
                <a href="index.php" class="btn btn-warning limpar">Limpar</a>  
            </div>
        ';
    } else {
        echo '
            <div class="form-group col-md-3">
                <label for="inputName">Data Inicial</label>          
                <input type="hidden" name="filter" value="1">      
                <input class="form-control" type="date"  id="data_inicial" preloa name="data_inicial">    
            </div>
            <div class="form-group col-md-3">
                <label for="inputName">Data Final</label>                
                <input class="form-control" type="date"  id="data_final" name="data_final">    
            </div>
            <div class="col-md-2" style="float:right;">
                <button type="submit" class="btn btn-primary filtrar">Filtrar</button> 
                <a href="index.php" class="btn btn-warning limpar">Limpar</a>  
            </div>
        ';
    }

?>