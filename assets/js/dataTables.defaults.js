$.extend( true, $.fn.dataTable.defaults, {
  "sDom": "<'row'<'col-xs-6'><'col-xs-6'f>r>t<'row'<'col-xs-3'i><'col-xs-3'l><'col-xs-6'p>>",
  "oLanguage":
    {
      "sProcessing":   "Processando...",
      "sLengthMenu":   "Mostrar _MENU_ registros",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
      "sInfoPostFix":  "",
      "sSearch":       "Buscar:",
      "sUrl":          "",
      "oPaginate": {
          "sFirst":    "Primeiro",
          "sPrevious": "Anterior",
          "sNext":     "Seguinte",
          "sLast":     "Último"
      }
    },
  "bFilter": false  //hide search
});