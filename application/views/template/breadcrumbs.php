<div class="breadcrumbs">
    <ul>
        <?php
        $total = $this->uri->total_segments();

        $prev="".getBaseURL();
        
        for ($i = 1; $i <= $total; $i++) {
            echo ' <li><a href="'.$prev.$this->uri->segment($i).'">'.$this->uri->segment($i).'</a> ';
            if ($i != $total)
                echo '<i class="fa fa-angle-right"></i> ';
            echo ' </li>';
            $prev = $prev.$this->uri->segment($i).'/';
        }
        ?>

    </ul>
    <div class="close-bread"> <a href="#"> <i class="fa fa-times"></i> </a> </div>
</div>