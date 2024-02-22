<ul>
    <li><a href="<?php echo base_url(); ?>Panel"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    
    <?php
      for ($i = 0; $i < count($modulos); $i++) {
        echo '<li><a href="'. base_url() . $modulos[$i]['url']. '"><i class="icon '. $modulos[$i]['icon'].'"></i><span>' . $modulos[$i]['nombre_privilegio']. '</span></a></li>';
      }
    ?>
</ul>