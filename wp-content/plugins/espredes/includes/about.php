<div class="about-espredes">
    <h1 class="title">Sobre</h1>
    <p><b>ESPREDES</b> - é um plugin para gerenciamento do site ESPREDES.</p>
    <ul>
        <li><a href="https://github.com/evertonmessias/espredes" target="_blank">Projeto</a></li>
        <li><a href="https://ic.unicamp.br/~everton" target="_blank">Site do Desenvolvedor</a></li>
    </ul>
    <br> 
    <hr>
    <h2 class="title">Registro de Acessos</h2>
    <table class="access">
        <tr>
            <th>id</th>
            <th>IP</th>
            <th>Data</th>
        </tr>
        <?php
        try {
            $lista = list_access('*');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        foreach ($lista as $item) {        
            $data = explode("-",explode(" ",$item->time)[0]);
            $datahora = $data[2]."/".$data[1]."/".$data[0]." , ".explode(" ",$item->time)[1];
            echo "<tr><td>" . $item->id . "</td><td>" . $item->ipadress . "</td><td>" . $datahora . "</td></tr>";
        }
        ?>
    </table>
</div>