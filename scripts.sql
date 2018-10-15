select c.categoria, SUM(f.total)
from facturas f inner join detalles d on
f.id = d.id_factura inner join productos p on
d.id_producto = p.id inner join categorias c on
p.id_categoria = c.id
group by c.categoria



<?php if(i=){ ?>
sliced: true,
selected: true
<?php } ?>
