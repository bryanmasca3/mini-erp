var rutaSQL = "pages/catalogos/logistica/sql.php";
var ubigeo = window.ubigeo

$('#slct_group_GruposClass').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 
  console.log(value);
  chargeCorrelativeGroupClass(value);
  
})
function modalDeleteAlmacen(id){
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : 'sql_delete_almacen',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
        updateGrid("gridAlmacenGrid");
        swal("Has eliminado el registro", {
        icon: "success",
      });

      });  
      
    }
  });
}
function modalDeleteItem(id){
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : 'sql_delete_item',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
        updateGrid("gridItemsGrid");
        swal("Has eliminado el registro", {
        icon: "success",
      });

      });  
      
    }
  });
}
function modalDeleteCategoryProveedor(id){
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : 'sql_delete_categoryProveedor',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
        updateGrid("gridProveedorCategory");
        swal("Has eliminado el registro", {
        icon: "success",
      });

      });  
      
    }
  });
}
function modalDeleteCategoryProveedor(id){
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "Eliminar un proveedor afectara tambien el registro de evaluación y selección de Proveedores",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : 'sql_delete_proveedor',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
        updateGrid("gridProveedorGrid");
        swal("Has eliminado el registro", {
        icon: "success",
      });

      });  
      
    }
  });
}


function generatepdfOrdenCompra(id){
  let datos = {
    TipoQuery : 'sql_get_orden_compra_by_id',
    data:id 
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(resp)
    let mainitems=resp.data.map((item)=>{

      return {'item':item.item,
      'codigo_parte':item.codigo_parte,
      'descripcion':item.descripcion,
      'cantidad':item.cantidad,
      'centro_costo':item.centro_costo,
      'unidad_medida':item.unidad_medida,
      'precio':item.precio,
      'total':(Number(item.cantidad)*Number(item.precio)).toFixed(2)
          }
    })
  
  var docDefinition = {
    pageOrientation: 'landscape',
    content: [
{
table: {
widths: ['15%', '20%', '45%', '20%'],
// heights: [10,10,10,10,30,10,25],
 headerRows: 1,
 body: [
     [
       {
         
         text: 'LOGO',                   
         fontSize: 8,
         alignment: 'center',
         rowSpan:3,

       } , {
        fontSize: 8,
        text: 'Sistema de Gestion de Calidad, Seguridad, Salud en el Trabjajo y Medio Ambiente',    
        colSpan:2,
        alignment: 'center'
       },
       {},
         {
           text: 'Codigo: LOG-P10F03',              
           bold: true,
           fontSize: 8,      

         }
     ],
     [
      {
         
       

      } , {
       fontSize: 8,
       text: 'TIPO DE DOCUMENTO:',    
      
      },
      {  text: 'ORDEN DE COMPRA',              
      bold: true,
      fontSize: 8,
      rowSpan:2,
      alignment: 'center'},
        {
          text: 'Fecha de Aprobacion:	8/31/2021',              
           bold: true,
           fontSize: 8,          
  
        }
    ],  
    [
      {
                
      } , {
       fontSize: 8,
       text: 'FORMATO',    
      
      },
      {  },
        {
          text: 'Versión: 01',              
           bold: true,
           fontSize: 8,              
        }
    ]
 ]
}
},
{
  table: {
  widths: ['15%','20%','15%','20%','15%','15%'],  
   headerRows: 1,
   body: [
       [
         {
           
           text: 'CORPORACION DE SERVICIOS MOQUEGUA',                     
           fontSize: 8,
           colSpan:2, 
           bold: true,
         } ,{},{fontSize: 8,
          text: 'N° OC:',
          bold: true,
          colSpan:4  },
         {      
         },{},{}
          
       ],
       [
        {
           
          text: 'RUC:',                     
          fontSize: 8,      
               
        } ,{
          text: '20533089292',                     
          fontSize: 8,
   
        },
        {   fontSize: 8,
         text: 'FECHA ORDEN:',
     
        },
        {
          fontSize: 8,
          text: resp.data[0].fecha_orden_compra,
   
        }
        ,{
          fontSize: 8,
          text: 'FECHA ENTREGA: ',
     
        },{
          fontSize: 8,
          text: '',
      
        }
         
      ],
      [
      
        {
           
          text: 'DIR:',                     
          fontSize: 8,
    
               
        } ,{
          text: 'AV. A.A CACERES MZ:L LTE:06 MOQUEGUA',                     
          fontSize: 8,

        },
        {   fontSize: 8,
         text: 'AREA SOLICITANTE:',
     
        },
        {
          fontSize: 8,
          text: resp.data[0].area,
          colSpan:3     
        }
        ,{
        
        },{
         
        }
          
      ],
      [
         
        {
           
          text: 'CELL:',                     
          fontSize: 8,
    
               
        } ,{
          text: '987931289',                     
          fontSize: 8,

        },
        {   fontSize: 8,
         text: 'SOLICITANTE:',
     
        },
        {
          fontSize: 8,
          text: resp.data[0].solicitante,
          colSpan:3     
        }
        ,{
        
        },{
         
        }
         
      ],
      [
       
        {
           
          text: 'E-MAIL:',                     
          fontSize: 8,
    
               
        } ,{
          text: 'cormoquegua@hotmail.com',                     
          fontSize: 8,

        },
        {   fontSize: 8,
         text: 'RESPONSABLE:',
     
        },
        {
          fontSize: 8,
          text: '',
          colSpan:3     
        }
        ,{
        
        },{
         
        }
         
      ]
   ]
  }
  },
  {
    table: {
    widths: ['20%', '30%','20%','30%'], 
     headerRows: 1,
     body: [
         [
           {
             
             text: 'PROVEEDOR:',                     
             fontSize: 8,
     
                  
           } , 
           {   
            fontSize: 8,
            text: '',     
           
           },
           {
             
            text: 'RUC:',                     
            fontSize: 8,
    
                 
          } , 
          {   
           fontSize: 8,
           text: '',     
          
          }
            
         ],
         [
          {
            
            text: 'DIRECCION:',                     
            fontSize: 8,
    
                 
          } , 
          {   
           fontSize: 8,
           text: '',     
          
          },
          {
            
           text: 'MONEDA:',                     
           fontSize: 8,
   
                
         } , 
         {   
          fontSize: 8,
          text: '',     
         
         }
           
        ],
        [
          {
            
            text: 'CONDICION:',                     
            fontSize: 8,
            
    
                 
          } , 
          {   
           fontSize: 8,
           text: '',     
           colSpan:3
          },
          {
       
                
         } , 
         {   
        
         
         }
           
        ]
     ]
    }
    },
    {
      table: {
      widths: ['15%', '85%'],  
       headerRows: 1,
       body: [
        [
          {
            
            text: 'N°. RQ:',                     
            fontSize: 8,
            border: [true, true,false,true]
                 
          } , 
          {   fontSize: 8,
           text: '',     
           border: [false, true,true,true]       
          }
           
        ],[
             {
               
               text: 'OBSERVACIONES (*):',                     
               fontSize: 8,
               border: [true, true,false,true]
                    
             } , 
             {   fontSize: 8,
              text: '',     
              border: [false, true,true,true]       
             }
              
           ]
       ]
      }
      },


    {
      table: {
        widths: ['5%','10%','30%','5%','10%','10%','15%','15%'],
        // heights: [10,10,10,10,30,10,25],
         headerRows: 1,
         body:buildTableBody(['item','codigo_parte','descripcion','cantidad','centro_costo',
         'unidad_medida','precio','total'],mainitems, [
          { 
              text: 'ITEM',               
              bold: true,              
              fontSize: 8,       
              fillColor: '#44b7ba',     
              border: [true, false, true, false]
              
          },
        { 
         
          text: 'CODIGO',               
          bold: true,          
          fontSize: 8,
          fillColor: '#44b7ba',    
          border: [true, false, true, false]        
          }  ,
          { 
            
            text: 'DESCRIPCION',               
            bold: true,        
            fillColor: '#44b7ba',    
            fontSize: 8,  
            border: [true, false, true, false]        
        }  ,{ 
         
          text: 'CANT.',               
          bold: true,          
          fontSize: 8,  
          fillColor: '#44b7ba',  
          border: [true, false, true, false]        
      },
      { 
         
        text: 'CENTRO DE COSTO.',               
        bold: true,          
        fontSize: 8,  
        fillColor: '#44b7ba',  
        border: [true, false, true, false]        
    },
        { 
            
          text: 'UM',               
          bold: true,          
          fontSize: 8,  
          fillColor: '#44b7ba', 
          border: [true, false, true, false]        
        }    ,
        { 
            
          text: 'PRECIO',               
          bold: true,          
          fontSize: 8,
           fillColor: '#44b7ba',  
          border: [true, false, true, false]        
        } , 
        { 
            
          text: 'TOTAL',               
          bold: true,          
          fontSize: 8,  
           fillColor: '#44b7ba', 
          border: [true, false, true, false]        
        }           
      ])
      }
      },
      {
        table: {
        widths: ['70%','15%','15%'],  
         headerRows: 1,
         body: [
             [
               {
                 
                 text: '',                     
                 fontSize: 8,
                 border: [true, false,true,false]                      
               },
               {
                 
                text: 'SUB TOTAL',                     
                fontSize: 8,
                border: [true, false,true,false]
                     
              },
              {
                 
                text: 'S/. '+resp.data[0].subtotal,                     
                fontSize: 8,
                border: [true, false,true,false]
                     
              }                   
             ],
             [
              {
                 
                text: '',                     
                fontSize: 8,
                border: [true, false,true,false]                      
              },
              {
                
               text: 'I.G.V. 18%',                     
               fontSize: 8,
               border: [true, false,true,false]
                    
             },
             {
                
               text: 'S/. '+(Number(resp.data[0].subtotal)*0.18).toFixed(2),                     
               fontSize: 8,
               border: [true, false,true,false]
                    
             }                 
            ],
            [
              {
                 
                text: '',                     
                fontSize: 8,
                border: [true, false,true,true]                      
              },
              {
                
               text: 'TOTAL',                     
               fontSize: 8,
               border: [true, false,true,true]
                    
             },
             {
                
               text: 'S/. '+resp.data[0].total,                     
               fontSize: 8,
               border: [true, false,true,true]
                    
             }                 
            ]
         ]
        }
        },
        {
          table: {
          widths: ['35%','30%','35%'],  
           headerRows: 1,
           body: [
               [
                 {
                   
                   text: '________________________',                     
                   fontSize: 8,
                   alignment: 'center',
                   border: [true, false,true,false],
                   margin: [ 0, 50, 0, 0 ]    
                 }   ,
                 {
                   
                  text: '_________________________',                     
                  fontSize: 8,
                  alignment: 'center',
                  border: [true, false,true,false],
                  margin: [ 0, 50, 0, 0 ]   
                       
                }  ,
                {
                   
                  text: '_________________________',                     
                  fontSize: 8,
                  alignment: 'center',
                  border: [true, false,true,false],
                  margin: [ 0, 50, 0, 0 ]   
                       
                }                
               ],
               [
                {
                  
                  text: 'AREA LOGISTICA',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                } ,
                {
                  
                  text: 'V.B. ADMINISTRACION',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                },   
                {
                  
                  text: 'V.B.  GERENCIA',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                }                   
              ]
           ]
          }
          },
          {
            table: {
            widths: ['100%'],  
             headerRows: 1,
             body: [
                 [
                   {
                     
                     text: 'NOTA:',                     
                     fontSize: 8,
                     border: [true, false,true,false]
                          
                   }                 
                 ],
                 [
                  {
                    
                    text: '1.-PARA ACCESORIOS Y/O RESPUESTOS ENVIAR LAS ESPECIFICACIONES TECNICAS, NECESARIAS PARA RESPALDAR ESTA COMPRA.',                     
                    fontSize: 8,
                    border: [true, false,true,false]
                         
                  }                 
                ],
                [
                  {
                    
                    text: '2.-RESPETAR LA FECHA DE ENTREGA PROGRAMADA PARA EVITAR RECHAZOS.',                     
                    fontSize: 8,
                    border: [true, false,true,false]
                         
                  }                 
                ],
                [
                  {
                    
                    text: '3.-PARA EMISORES DE FACTURAS ELECTRONICAS REMITIR LA FACTURA, ARCHIVO XML Y CDR AL E-MAIL fcentenog@corporacionmoquegua.com',                     
                    fontSize: 8,
                    border: [true, false,true,true]
                         
                  }                 
                ]
             ]
            }
            },
],
  defaultStyle: {
  }
};
pdfMake.createPdf(docDefinition).open();

})

}
function generatepdfRequerimiento(id){

  let datos = {
    TipoQuery : 'sql_get_requerimiento_by_id',
    data:id 
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(resp)

  
  var docDefinition = {
    pageOrientation: 'landscape',
    content: [
{
table: {
widths: ['15%', '45%', '20%', '20%'],
// heights: [10,10,10,10,30,10,25],
 headerRows: 1,
 body: [
     [
       {
         
         text: 'LOGO',              
     
         fontSize: 8,
         alignment: 'center',
         rowSpan:3,
         colSpan:2,
       } , {},
         {
           text: 'REQUERIMIENTO',              
           bold: true,
           fontSize: 10,
           rowSpan:3,
           alignment: 'center'
         },
         { 
           text: 'CODIGO: LOG-P10F01',              
  
           fontSize: 8,       
         }
     ],
     [
      {   
                
      } , {},
        {
          
        },
        { 
          text: 'VERSION:',              
          fontSize: 8         
        }
    ],  
    [
      {   
            
      } , {},
        {
          
        },
        { 
          text: 'FECHA:',              
          fontSize: 8
        
        }
    ]
 ]
}
},
{
  table: {
  widths: ['15%', '35%','15%','35%'],  
   headerRows: 1,
   body: [
       [
         {
           
           text: 'RUC',                     
           fontSize: 8,
                
         } , 
         {   fontSize: 8,
          text: '20533089292',
          colSpan:3     
         },{},{}
          
       ],
       [
        {
          
          text: 'NOMBRE',                     
          fontSize: 8,
                
        }, 
        {   fontSize: 8,
          text: 'CORPORACIÓN DE SERVICIOS MOQUEGUA EIRL',
          colSpan:3     
        },{},{}
         
      ],
      [
        {
          
          text: 'SOLICITANTE',                     
          fontSize: 8,
                 
        }, 
        {   
          fontSize: 8,
          text: resp.data[0].solicitante,
          colSpan:3
        },{},{}
         
      ],
      [
        {
          
          text: 'FECHA DE EMISIÓN',                     
          fontSize: 8,
           
        }, 
        {   fontSize: 8,
          text: resp.data[0].fecha_requerimiento,   
          colSpan:3  
        },{},{}
         
      ],
      [
        {
          
          text: 'AREA',                     
          fontSize: 8,
           
        }, 
        {   
          fontSize: 8,
          text: resp.data[0].area             
        },{             
        text: 'CENTRO DE COSTO',                     
        fontSize: 8,
      },{
        fontSize: 8,
        text: resp.data[0].centro_costo
      }
         
      ]
   ]
  }
  },
  {
    table: {
    widths: ['15%', '85%'],  
     headerRows: 1,
     body: [
         [
           {
             
             text: 'OBSERVACIONES (*) :',                     
             fontSize: 8,
             border: [true, true,false,true]
                  
           } , 
           {   fontSize: 8,
            text: '',     
            border: [false, true,true,true]       
           }
            
         ]
     ]
    }
    },
    {
      table: {
        widths: ['5%','5%','10%','30%','10%','10%','30%'],
        // heights: [10,10,10,10,30,10,25],
         headerRows: 1,
         body:buildTableBody(['item','cantidad','codigo_parte','descripcion',
         'unidad_medida','prioridad','observacion'],resp.data, [
          { 
              text: 'ITEM',               
              bold: true,              
              fontSize: 8,       
              fillColor: '#44b7ba',     
              border: [true, false, true, false]
              
          },{ 
         
            text: 'CANT.',               
            bold: true,          
            fontSize: 8,  
            fillColor: '#44b7ba',  
            border: [true, false, true, false]        
        },
        { 
         
          text: 'CODIGO',               
          bold: true,          
          fontSize: 8,
          fillColor: '#44b7ba',    
          border: [true, false, true, false]        
          }  ,
          { 
            
            text: 'DESCRIPCION',               
            bold: true,        
            fillColor: '#44b7ba',    
            fontSize: 8,  
            border: [true, false, true, false]        
        }  ,
        { 
            
          text: 'MEDIDA',               
          bold: true,          
          fontSize: 8,  
          fillColor: '#44b7ba', 
          border: [true, false, true, false]        
        }    ,
        { 
            
          text: 'PRIORIDAD',               
          bold: true,          
          fontSize: 8,
           fillColor: '#44b7ba',  
          border: [true, false, true, false]        
        } , 
        { 
            
          text: 'OBSERVACIÓN',               
          bold: true,          
          fontSize: 8,  
           fillColor: '#44b7ba', 
          border: [true, false, true, false]        
        }           
      ])
      },
      },
      {
        table: {
        widths: ['100%'],  
         headerRows: 1,
         body: [
             [
               {
                 
                 text: '(*) Consignar Placa de la unidad, Km, Area de Trabajo, otros',                     
                 fontSize: 8,
                 border: [true, false,true,false]
                      
               }                 
             ],
             [
              {
                
                text: '(**)Consignar todos los datos necesarios para el servicio',                     
                fontSize: 8,
                border: [true, false,true,true]
                     
              }                 
            ]
         ]
        }
        },
        {
          table: {
          widths: ['35%','30%','35%'],  
           headerRows: 1,
           body: [
               [
                 {
                   
                   text: '________________________',                     
                   fontSize: 8,
                   alignment: 'center',
                   border: [true, false,true,false],
                   margin: [ 0, 50, 0, 0 ]    
                 }   ,
                 {
                   
                  text: '_________________________',                     
                  fontSize: 8,
                  alignment: 'center',
                  border: [true, false,true,false],
                  margin: [ 0, 50, 0, 0 ]   
                       
                }  ,
                {
                   
                  text: '_________________________',                     
                  fontSize: 8,
                  alignment: 'center',
                  border: [true, false,true,false],
                  margin: [ 0, 50, 0, 0 ]   
                       
                }                
               ],
               [
                {
                  
                  text: 'SOLICITANTE',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                } ,
                {
                  
                  text: 'ALMACEN/COMPRAS',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                },   
                {
                  
                  text: 'GERENTE',                     
                  fontSize: 8,
                   alignment: 'center',
                  border: [true, false,true,true],
                  margin: [ 0, 0, 0, 8 ]   
                       
                }                   
              ]
           ]
          }
          },
          {
            table: {
            widths: ['100%'],  
             headerRows: 1,
             body: [
                 [
                   {
                     
                     text: 'Prioridad:',                     
                     fontSize: 8,
                     border: [true, false,true,false]
                          
                   }                 
                 ],
                 [
                  {
                    
                    text: 'Alta = Atendidas dentro de las 48 hrs. de haber ingresado el requerimiento (Suministros críticos).',                     
                    fontSize: 8,
                    border: [true, false,true,false]
                         
                  }                 
                ],
                [
                  {
                    
                    text: 'Media = Atendidas dentro de las 72 horas de haber ingresado el requerimiento. ',                     
                    fontSize: 8,
                    border: [true, false,true,false]
                         
                  }                 
                ],
                [
                  {
                    
                    text: 'Baja = Atendidas dentro de los 7 días de haber ingresado el requerimiento.',                     
                    fontSize: 8,
                    border: [true, false,true,true]
                         
                  }                 
                ]
             ]
            }
            },
],
  defaultStyle: {
  }
};
pdfMake.createPdf(docDefinition).open();

})

}


function buildTableBody(header,data, columns) {
  var body = [];

  body.push(columns);

  console.log(header)
  console.log(data)
  console.log(columns)

  data.forEach(function(row) {
      var dataRow = [];

      header.forEach(function(column) {
        if(row[column]){
          dataRow.push({text:row[column].toString(),bold: false,fontSize: 8});
        }else{
          dataRow.push({text:'',fontSize: 8});
        }
         
      })

      body.push(dataRow);
  });

  return body;
}
function CalPrice(cantidad,price){  
  return (Number(cantidad)*Number(price)).toFixed(2);
}
function keyCalPriceOrdenCompra(idx){
 
  let cantidad = $("#cantidadordenCompraInputs-"+idx).text();
  let precio = $("#priceordencomprainputs-"+idx).val();

  $("#PriceTordenCompraInputs-"+idx).text((Number(cantidad) * Number(precio)).toFixed(2));
 // let subtotal=$(".totalSubTotalPriceOrdenCompra")

  var values = $.map($('.totalSubTotalPriceOrdenCompra') ,function(option) {  
    console.log(option)          
    return option.textContent
});   
console.log(values)
let subtotal=(values.reduce((a, b) => Number(a) + Number(b), 0)).toFixed(2)
let igv=(Number(subtotal)*0.18).toFixed(2);
let total=(Number(subtotal)+Number(igv)).toFixed(2);

$("#txt_subtotal_orden_compra_moda").val(subtotal)
$("#txt_igv_orden_compra_modal").val(igv)
$("#txt_total_orden_compra_modal").val(total)

console.log(subtotal)
console.log(igv)
console.log(total)
}
$('#txt_estado_orden_comrpa_modal').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val();  
  if(value==10){
    changeOpenProviderOC(value);  
    $('.inputforordenCompra').prop('disabled', false)
    $('#addbutonMainOrdenCompra').show();
  
  }else{
    $('#addbutonMainOrdenCompra').hide();
    $("#contentProviderOC").hide();
    $('.inputforordenCompra').prop('disabled', true)
  }  
})
function changeOpenProviderOC(){
  $("#contentProviderOC").show();
}
$('#slct_departamento_proveedor').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); //to get content of "value" attrib
  console.log(value)
  $('#slct_provincia_proveedor option').remove();
  $('#slct_provincia_proveedor').append($("<option>", {
      value: "-1",
      text: "Selecciona...",  
  }));
  $.each(ubigeo.provincias[value], function(i, item) {      
      $('#slct_provincia_proveedor').append($("<option>", {
          value: item.id_ubigeo,
          text: item.nombre_ubigeo,
      }));
  });
})

$('#slct_provincia_proveedor').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); //to get content of "value" attrib
  $('#slct_distrito_proveedor option').remove();
  $('#slct_distrito_proveedor').append($("<option>", {
      value: "-1",
      text: "Selecciona...",
  }));
  $.each(ubigeo.distritos[value], function(i, item) {
      $('#slct_distrito_proveedor').append($("<option>", {
          value: item.id_ubigeo,
          text: item.nombre_ubigeo,    
      }));
  });
})


$('#txt_departamento_almacen').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); //to get content of "value" attrib
  console.log(value)
  $('#txt_provincia_almacen option').remove();
  $('#txt_provincia_almacen').append($("<option>", {
      value: "-1",
      text: "Selecciona...",  
  }));
  $.each(ubigeo.provincias[value], function(i, item) {      
      $('#txt_provincia_almacen').append($("<option>", {
          value: item.id_ubigeo,
          text: item.nombre_ubigeo,
      }));
  });
})

$('#txt_provincia_almacen').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); //to get content of "value" attrib
  $('#txt_distrito_almacen option').remove();
  $('#txt_distrito_almacen').append($("<option>", {
      value: "-1",
      text: "Selecciona...",
  }));
  $.each(ubigeo.distritos[value], function(i, item) {
      $('#txt_distrito_almacen').append($("<option>", {
          value: item.id_ubigeo,
          text: item.nombre_ubigeo,    
      }));
  });
})
function loadDepartamentos(data,component){
  var departamentos = data.departamentos  

  $.each(departamentos, function (i, item) {    
    $('#'+component).append($("<option>", { 
        value: item.id_ubigeo,
        text : item.nombre_ubigeo ,       
    }));
  });
}
$('#slct_grupo_proveedor').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 

  let datos = {
    TipoQuery : 'sqlGroupClassByGroup',
    data:value
  };                

 appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $("#slct_clase_proveedor option[value!='-1']").remove();
      resp.data.forEach((item)=>{
        $('#slct_clase_proveedor').append($("<option>", { 
          value: item.id,
          text : item.description 
      }));
      })
     
  }); 
  
})

$('#slct_groupClass').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 

  console.log(value)
  chargeCorrelativeItems(value);
  
})

$('#txt_estado_oc_componenttoVehicle').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 
  if(value==1){
    $("#details_oc_to_componentVehicle").show();
  }else{
    $("#details_oc_to_componentVehicle").hide();
  }

})
$('#txt_estado_p_od_pertenece').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 
  if(value==1){
    $("#detailsOC_component").show();
  }else{
    $("#detailsOC_component").hide();
  }

})




$('#slct_group_add_items').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 

  let datos = {
    TipoQuery : 'sqlGroupClassByGroup',
    data:value
  };                

 appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $("#slct_groupClass_add_items option[value!='-1']").remove();
      resp.data.forEach((item)=>{
        $('#slct_groupClass_add_items').append($("<option>", { 
          value: item.code+"-"+value,
          text : item.description 
      }));
      })
     
  }); 
  
})

$('#slct_groupClass_add_items').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 

  let datos = {
    TipoQuery : 'sqlGroupClassByGroupAndItems',
    class:value,
    group:$("#slct_group_add_items").val()
  };                
console.log(datos)
 appAjaxQuery(datos,rutaSQL).done(function(resp){     
  console.log(resp)
    $("#slct_items_add_items option[value!='-1']").remove();
      resp.data.forEach((item)=>{
        $('#slct_items_add_items').append($("<option>", { 
          value: item.id,
          text : item.description 
      }));
      })
     
  }); 
  
})


$('#slct_items_add_items').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 

  let datos = {
    TipoQuery : 'sqlGroupClassByGroupAndItemsDescripcion',
    data:value  
  };                
//console.log(datos)
 appAjaxQuery(datos,rutaSQL).done(function(resp){     
  console.log(resp)
    $("#txt_descripcion_items_add").val(resp.data.description)
    $("#txt_unidad_medida_items_add").val(resp.data.unidad_medida)
    
  }); 
  
})


$('#slct_group').change(function() {
  var $option = $(this).find('option:selected');
  var value = $option.val(); 
  console.log(value)
  if(value!=10){
    $("#buttonforVehicleItem").show();
  }else{
    $("#buttonforVehicleItem").hide();
  }
  let datos = {
    TipoQuery : 'sqlGroupClassByGroup',
    data:value
  };                

$("#txt_codigo_items").val("");
 appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $("#slct_groupClass option[value!='-1']").remove();
      resp.data.forEach((item)=>{
        $('#slct_groupClass').append($("<option>", { 
          value: item.code+"-"+value,
          text : item.description 
      }));
      })
     
  }); 
  
})

function chargeCorrelativeItems(value){
  let datos = {
    TipoQuery : 'sql_getCorrelativeItems',
    data:{
      first:value.split("-")[0],
      second:value.split("-")[1],
    }
  };                
 console.log(datos);
 appAjaxQuery(datos,rutaSQL).done(function(resp){   
      console.log(resp)
      let newCorrelative=Number(resp.data.correlative)+1;      
    $("#txt_codigo_items").val(resp.data.grupo+"."+resp.data.code+"."+resp.data.acro+"-"+newCorrelative);
    //  $("#txt_codigo_items").val(resp.data.acro+"-"+newCorrelative);
                     
  }); 
}
function OpenModalProveedorSeleccionDetails(id){  
  let datos = {
    TipoQuery : 'sql_get_details_seleccion_proveedor',
    value:id
  };  
  var table;   

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)


    $("#modal_showDetail_seleccionProveedor_tipo").val(resp.data.tipo_servicio);
    $("#modal_showDetail_seleccionProveedor_fecha").val(resp.data.fecha);

    $("#modal_showDetail_seleccionProveedor_table > tbody").empty();
    $("#modal_showDetail_seleccionProveedor_table > thead").empty();
    $("#modal_showDetail_seleccionProveedor_table > tfoot").empty();

    $("#modal_showDetail_seleccionProveedor_table > thead").append("<tr>"+
        "<th>CRITERIOS DE EVALUACION</th>"+
        "<th>"+resp.data.proveedor1+"</th>"+
        "<th>"+resp.data.proveedor2+"</th>"+
        "<th>"+resp.data.proveedor3+"</th>"+   
    "</tr>");

    $("#modal_showDetail_seleccionProveedor_table > tfoot").append(
      "<tr>"+
      "<th>TOTAL</th>"+
      "<th>"+resp.data.proveedor1_puntaje+"</th>"+
      "<th>"+resp.data.proveedor2_puntaje+"</th>"+
      "<th>"+resp.data.proveedor3_puntaje+"</th>"+  
    "</tr>"
    );
    for (let index = 1; index <= 8; index++) {
      $("#modal_showDetail_seleccionProveedor_table > tbody").append("<tr>"+
        "<td>"+(resp.criterios[0]['PR_'+index])+"</td>"+
        "<td>"+(resp.criterios[0]['PT_'+index])+"</td>"+
        "<td>"+(resp.criterios[1]['PT_'+index])+"</td>"+
        "<td>"+(resp.criterios[2]['PT_'+index])+"</td>"+       
      "</tr>")

    }

        
    $('#modal_showDetail_seleccionProveedor').modal('show');
  } );   
}

function OpenModalProveedorEvaluacionDetails(id){  
  let datos = {
    TipoQuery : 'sql_get_details_evaluacion_proveedor',
    value:id
  };  
  var table;   
  console.log(id)
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)


    $("#modal_showDetail_evaluacionProveedor_fecha").val(resp.data.fecha);

    $("#modal_showDetail_evaluacionProveedor_table > tbody").empty();
    $("#modal_showDetail_evaluacionProveedor_table > thead").empty();
    $("#modal_showDetail_evaluacionProveedor_table > tfoot").empty();

    $("#modal_showDetail_evaluacionProveedor_table > thead").append("<tr>"+
        "<th>CRITERIOS DE EVALUACION</th>"+
        "<th>"+resp.data.proveedor1+"</th>"+
        "<th>"+resp.data.proveedor2+"</th>"+
        "<th>"+resp.data.proveedor3+"</th>"+   
    "</tr>");

    $("#modal_showDetail_evaluacionProveedor_table > tfoot").append(
      "<tr>"+
      "<th>TOTAL</th>"+
      "<th>"+resp.data.proveedor1_puntaje+"</th>"+
      "<th>"+resp.data.proveedor2_puntaje+"</th>"+
      "<th>"+resp.data.proveedor3_puntaje+"</th>"+  
    "</tr>"
    );
    for (let index = 1; index <= 2; index++) {
      $("#modal_showDetail_evaluacionProveedor_table > tbody").append("<tr>"+
        "<td>"+(resp.criterios[0]['PR_'+index])+"</td>"+
        "<td>"+(resp.criterios[0]['PT_'+index])+"</td>"+
        "<td>"+(resp.criterios[1]['PT_'+index])+"</td>"+
        "<td>"+(resp.criterios[2]['PT_'+index])+"</td>"+       
      "</tr>")

    }

        
    $('#modal_showDetail_evaluacionProveedor').modal('show');
  } );   
}
function chargeCorrelativeGroupClass(value){
  let datos = {
    TipoQuery : 'sql_getCorrelativeGroupClass',
    data:value
  };                

 appAjaxQuery(datos,rutaSQL).done(function(resp){   
      let newCorrelative=Number(resp.code)+1;      
      $("#txt_codigo_GruposClass").val(value+"."+newCorrelative);
                     
  }); 
}
function HistorialAlmacenes(){
  
    $("#NuevoRegistroAlmacen").hide();
    $("#HistorialAlmacenes").show();
    updateGrid("gridAlmacenGrid");
    //updateGrid("gridOperacionTarea");
    $("#link_NuevoRegistroAlmacen").removeClass("active");
    $("#link_HistorialAlmacenes").addClass("active");
  
  }

  function HistorialRequerimientos(){
    $("#NuevoRegistroRequerimientos").hide();
    $("#HistorialRequerimientos").show();
    updateGrid("gridRequerimientoGrid");
    $("#link_NuevoRegistroRequerimientos").removeClass("active");
    $("#link_HistorialRequerimientos").addClass("active");
  }
function HistorialOrdenDeCompra(){
  $("#HistorialOrdenDeCompra").show();
  updateGrid("gridOrdenCompraGrid");
  $("#link_HistorialOrdenDeCompra").addClass("active");
}

  function NuevoRegistroRequerimientos(){
    $("#HistorialRequerimientos").hide();
    $("#NuevoRegistroRequerimientos").show();
    
    $("#link_HistorialRequerimientos").removeClass("active");
    $("#link_NuevoRegistroRequerimientos").addClass("active");
  }
  loadDepartamentos(ubigeo, "txt_departamento_almacen");
  function NuevoRegistroAlmacen(){
    
    $("#HistorialAlmacenes").hide();
    $("#NuevoRegistroAlmacen").show();
    //loadDepartamentos(ubigeo, "txt_departamento_almacen");
    $("#link_HistorialAlmacenes").removeClass("active");
  
    $("#link_NuevoRegistroAlmacen").addClass("active");
  
  }

  function HistorialItems(){
  
    $("#NuevoRegistroItems").hide();
    $("#HistorialItems").show();
    updateGrid("gridItemsGrid");
    //updateGrid("gridOperacionTarea");
    $("#link_NuevoRegistroItems").removeClass("active");
    $("#link_HistorialItems").addClass("active");
  
  }
  loadSelectGroupandGroupClass();
  function NuevoRegistroItems(){
    
    $("#HistorialItems").hide();
    $("#NuevoRegistroItems").show();
 
    $("#link_HistorialItems").removeClass("active");
    //loadSelectGroupandGroupClass();
    $("#link_NuevoRegistroItems").addClass("active");
  
  }
  loadSelectGroupandGroupClassAddItems()
  function loadSelectGroupandGroupClassAddItems(){
    let datos = {
      TipoQuery : 'sqlGroupGrid'
    };                
    $('#slct_group_add_items option').remove();
  $('#slct_group_add_items').append($("<option>", {
      value: "-1",
      text: "Selecciona...",  
  }));
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
        resp.data.forEach((item)=>{
          $('#slct_group_add_items').append($("<option>", { 
            value: item.code,
            text : item.description 
        }));
        })
       
    }); 
  
  }


  function loadSelectGroupandGroupClass(){
    let datos = {
      TipoQuery : 'sqlGroupGrid'
    };                
    $('#slct_group option').remove();
  $('#slct_group').append($("<option>", {
      value: "-1",
      text: "Selecciona...",  
  }));
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
        resp.data.forEach((item)=>{
          $('#slct_group').append($("<option>", { 
            value: item.code,
            text : item.description 
        }));
        })
       
    }); 
  
  }
  function loadProveedorGroup(){
    let datos = {
      TipoQuery : 'sqlGroupGrid'
    };                
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
      console.log(resp)
        resp.data.forEach((item)=>{
          $('#slct_grupo_proveedor').append($("<option>", { 
            value: item.code,
            text : item.description 
        }));
        })
       
    }); 
  }
  function HistorialGrupos(){
  
    $("#NuevoRegistroGrupos").hide();
    $("#HistorialGrupos").show();
    updateGrid("gridGroupGrid");
    //updateGrid("gridOperacionTarea");
    $("#link_NuevoRegistroGrupos").removeClass("active");
    $("#link_HistorialGrupos").addClass("active");
  
  }
  chargeCorrelativeGroup();
  function NuevoRegistroGrupos(){
    
    $("#HistorialGrupos").hide();
    $("#NuevoRegistroGrupos").show();
  
    $("#link_HistorialGrupos").removeClass("active");
  
    $("#link_NuevoRegistroGrupos").addClass("active");
    
    //chargeCorrelativeGroup();
  }
  function chargeCorrelativeGroup(){
    let datos = {
      TipoQuery : 'sql_getCorrelativeGroup'
    };                
   appAjaxQuery(datos,rutaSQL).done(function(resp){   
        let newCorrelative=Number(resp.code)+1;
        //console.log(newCorrelative);
        $("#txt_codigo").val(newCorrelative);
                       
    }); 

  }
  function HistorialGruposClass(){
  
    $("#NuevoRegistroGruposClass").hide();
    $("#HistorialGruposClass").show();
    updateGrid("gridGroupClassGrid");
    //updateGrid("gridOperacionTarea");
    $("#link_NuevoRegistroGruposClass").removeClass("active");
    $("#link_HistorialGruposClass").addClass("active");
  
  }
  function NuevoRegistroGruposClass(){
    
    $("#HistorialGruposClass").hide();
    $("#NuevoRegistroGruposClass").show();  
    $("#link_HistorialGruposClass").removeClass("active");
   // loadSelectGroup();
    $("#link_NuevoRegistroGruposClass").addClass("active");
  
  }
  loadSelectGroup();
  function loadSelectGroup(){
    let datos = {
      TipoQuery : 'sqlGroupGrid'
    };                

   appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $('#slct_group_GruposClass option').remove();
    $('#slct_group_GruposClass').append($("<option>", {
        value: "-1",
        text: "Selecciona...",  
    }));
        resp.data.forEach((item)=>{
          $('#slct_group_GruposClass').append($("<option>", { 
            value: item.code,
            text : item.description 
        }));
        })
       
    }); 
  
  }
  function loadSelectProveedorCategory(){
    let datos = {
      TipoQuery : 'sqlProveedorGroup'
    };                
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
        resp.data.forEach((item)=>{
          $('#slct_categoria_proveedor').append($("<option>", { 
            value: item.id,
            text : item.description 
        }));
        })
       
    }); 
  
  }
  function EvaluarEvaluacionProveedor(){
    let error=0;
    let Maindata=[
      {element:"selectProveedorEvaluacion-1",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorEvaluacion-2",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorEvaluacion-3",type:"selectArray",status:1,value:"selectArray"},
      {element:"proveedorEvalucion-1",type:"select",status:1,value:"select"},
      {element:"proveedorEvalucion-2",type:"select",status:1,value:"select"},
      {element:"proveedorEvalucion-3",type:"select",status:1,value:"select"}    
    ]
    if(validateEvaluation(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
      error=1;
    }else{
        
      var SeleccionProveedor1=$('#tableEvaluacionProveedor > tbody').find(".selectProveedorEvaluacion-1").map(function(){return $(this).val();}).get();
      var SeleccionProveedor2=$('#tableEvaluacionProveedor > tbody').find(".selectProveedorEvaluacion-2").map(function(){return $(this).val();}).get();
      var SeleccionProveedor3=$('#tableEvaluacionProveedor > tbody').find(".selectProveedorEvaluacion-3").map(function(){return $(this).val();}).get();
     
  
      let totalProveedor1=SeleccionProveedor1.reduce((a, b) => Number(a) + Number(b), 0);
      let totalProveedor2=SeleccionProveedor2.reduce((a, b) => Number(a) + Number(b), 0);
      let totalProveedor3=SeleccionProveedor3.reduce((a, b) => Number(a) + Number(b), 0);
   
      $("#totalEvalucionProveedor1").val((totalProveedor1/Number(SeleccionProveedor1.length)).toFixed(2));
      $("#totalEvalucionProveedor2").val((totalProveedor2/Number(SeleccionProveedor2.length)).toFixed(2));
      $("#totalEvalucionProveedor3").val((totalProveedor3/Number(SeleccionProveedor3.length)).toFixed(2)); 
      
      
      $( ".boxescolors" ).remove();
      $("#result_evaluacion_1").append(generateBoxCalification($("#totalEvalucionProveedor1").val()));
      $("#result_evaluacion_2").append(generateBoxCalification($("#totalEvalucionProveedor2").val()));
      $("#result_evaluacion_3").append(generateBoxCalification($("#totalEvalucionProveedor3").val()));

    }

  return error;
  }
  function EvaluarSeleccionProveedor(){
    let error=0;
    let Maindata=[
      {element:"selectProveedorSeleccion-1",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorSeleccion-2",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorSeleccion-3",type:"selectArray",status:1,value:"selectArray"},
      {element:"proveedorSeleccion-1",type:"select",status:1,value:"select"},
      {element:"proveedorSeleccion-2",type:"select",status:1,value:"select"},
      {element:"proveedorSeleccion-3",type:"select",status:1,value:"select"}    
    ]
    if(validateEvaluation(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
      error=1;
    }else{
        
      var SeleccionProveedor1=$('#tableSeleccionProveedor > tbody').find(".selectProveedorSeleccion-1").map(function(){return $(this).val();}).get();
      var SeleccionProveedor2=$('#tableSeleccionProveedor > tbody').find(".selectProveedorSeleccion-2").map(function(){return $(this).val();}).get();
      var SeleccionProveedor3=$('#tableSeleccionProveedor > tbody').find(".selectProveedorSeleccion-3").map(function(){return $(this).val();}).get();
         

      let totalProveedor1=SeleccionProveedor1.reduce((a, b) => Number(a) + Number(b), 0);
      let totalProveedor2=SeleccionProveedor2.reduce((a, b) => Number(a) + Number(b), 0);
      let totalProveedor3=SeleccionProveedor3.reduce((a, b) => Number(a) + Number(b), 0);
  
      $("#totalSeleccionProveedor1").val((totalProveedor1/Number(SeleccionProveedor1.length)).toFixed(2));
      $("#totalSeleccionProveedor2").val((totalProveedor2/Number(SeleccionProveedor2.length)).toFixed(2));
      $("#totalSeleccionProveedor3").val((totalProveedor3/Number(SeleccionProveedor3.length)).toFixed(2)); 
      
    
    $( ".boxescolors" ).remove();
    $("#result_seleccion_1").append(generateBoxCalification($("#totalSeleccionProveedor1").val()));
    $("#result_seleccion_2").append(generateBoxCalification($("#totalSeleccionProveedor2").val()));
    $("#result_seleccion_3").append(generateBoxCalification($("#totalSeleccionProveedor3").val()));

    }

  return error;
  }

  function generateBoxCalification(val){

    let element=''
    if(val<2){
      element='<div class="boxescolors" style="width:30px;height:20px;background-color:red;color:black">PMC</div>'
    }
    else if(val>=2.0 && val <=2.25){
      element='<div class="boxescolors" style="width:30px;height:20px;background-color:yellow;color:black">PAC</div>'
    }else{
      element='<div class="boxescolors" style="width:30px;height:20px;background-color:green;color:black">PEX</div>'
    }
    return element
}

  function add_EvaluarEvaluacionProveedor(){
    let id=(new Date()).getTime();
    let Maindata=[
      {title:"id",element:"",type:"text",status:0,value:id},
      {title:"evaluador",element:"txt_evaluacion_evaluacionProveedor_evaluador2",type:"text",status:1,value:"val"},

      {title:"search",element:"txt_search_evaluador_proveedor_evaluated",type:"text",status:1,value:"val"},
      {title:"name",element:"txt_solicitante_nombres_evaluador_proveedor",type:"text",status:1,value:"val"},
      {title:"surname",element:"txt_solicitante_apellidos_evaluador_proveedor",type:"text",status:1,value:"val"},


      {title:"proveedor1",element:"proveedorEvalucion-1",type:"select",status:1,value:"selectVal"},
      {title:"proveedor2",element:"proveedorEvalucion-2",type:"select",status:1,value:"selectVal"},
      {title:"proveedor3",element:"proveedorEvalucion-3",type:"select",status:1,value:"selectVal"},

      {title:"proveedor1_puntaje",element:"totalEvalucionProveedor1",type:"text",status:1,value:"val"},
      {title:"proveedor2_puntaje",element:"totalEvalucionProveedor2",type:"text",status:1,value:"val"},
      {title:"proveedor3_puntaje",element:"totalEvalucionProveedor3",type:"text",status:1,value:"val"},      
    ]
    let MaindataSelect=[
      {element:"selectProveedorEvaluacion-1",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorEvaluacion-2",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorEvaluacion-3",type:"selectArray",status:1,value:"selectArray"},
      {element:"proveedorEvalucion-1",type:"select",status:1,value:"select"},
      {element:"proveedorEvalucion-2",type:"select",status:1,value:"select"},
      {element:"proveedorEvalucion-3",type:"select",status:1,value:"select"}    
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{

      let pregunta1=$(".selectProveedorEvaluacion-1").map(function(){return $(this).val();}).get(); 
      let pregunta2=$(".selectProveedorEvaluacion-2").map(function(){return $(this).val();}).get(); 
      let pregunta3=$(".selectProveedorEvaluacion-3").map(function(){return $(this).val();}).get(); 

          if(!EvaluarEvaluacionProveedor()){
            let datos = {
              TipoQuery : 'sql_saveEvaluacionProveedor',
              data:generateInsertData(Maindata),
              criterio:[pregunta1,pregunta2,pregunta3]   
            };                
           appAjaxQuery(datos,rutaSQL).done(function(resp){   

            $( ".boxescolors" ).remove();            
                ResetAndUpdateGrid(Maindata,updateGrid,"gridHistoriaEvaluacionProveedorGrid");
                ResetAndUpdateGrid(MaindataSelect);
                swal("Insertado correctamente", {
                  icon: "success",
                });   
                               
            }); 
          }                          
    }
  }
  function loadSelectedGestionPersonasMotivo(){
    let datos = {
      TipoQuery : '03_selected_gestionPersona_motivo'   
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
      console.log(resp);
    $.each(resp[0], function(i, item) {
      $('#personas_select_motivo').append($("<option>", {
          value: item.id,
          text: item.descripcion,    
      }));
    });
  });
  }
  function add_EvaluarSeleccionProveedor(){
    let id=(new Date()).getTime();
    let Maindata=[
      {title:"id",element:"",type:"text",status:0,value:id},
      {title:"tipo_servicio",element:"txt_seleccion_evaluacionProveedor_tipo",type:"text",status:1,value:"val"},
      {title:"evaluador",element:"txt_seleccion_evaluacionProveedor_evaluador",type:"text",status:1,value:"val"},

      {title:"search",element:"txt_search_evaluador_proveedor_selected",type:"text",status:1,value:"val"},
      {title:"nombre",element:"txt_solicitante_nombres_seleccion_proveedor",type:"text",status:1,value:"val"},
      {title:"apellido",element:"txt_solicitante_apellidos_seleccion_proveedor",type:"text",status:1,value:"val"},
      

      {title:"proveedor1",element:"proveedorSeleccion-1",type:"select",status:1,value:"selectVal"},
      {title:"proveedor2",element:"proveedorSeleccion-2",type:"select",status:1,value:"selectVal"},
      {title:"proveedor3",element:"proveedorSeleccion-3",type:"select",status:1,value:"selectVal"},

      {title:"proveedor1_puntaje",element:"totalSeleccionProveedor1",type:"text",status:1,value:"val"},
      {title:"proveedor2_puntaje",element:"totalSeleccionProveedor2",type:"text",status:1,value:"val"},
      {title:"proveedor3_puntaje",element:"totalSeleccionProveedor3",type:"text",status:1,value:"val"},      
    ]
    let MaindataSelect=[
      {element:"selectProveedorSeleccion-1",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorSeleccion-2",type:"selectArray",status:1,value:"selectArray"},
      {element:"selectProveedorSeleccion-3",type:"selectArray",status:1,value:"selectArray"},
      {element:"proveedorSeleccion-1",type:"select",status:1,value:"select"},
      {element:"proveedorSeleccion-2",type:"select",status:1,value:"select"},
      {element:"proveedorSeleccion-3",type:"select",status:1,value:"select"}    
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{

      let pregunta1=$(".selectProveedorSeleccion-1").map(function(){return $(this).val();}).get(); 
      let pregunta2=$(".selectProveedorSeleccion-2").map(function(){return $(this).val();}).get(); 
      let pregunta3=$(".selectProveedorSeleccion-3").map(function(){return $(this).val();}).get(); 

      //console.log(d)
       // console.log(generateInsertData(MaindataSelect))
          if(!EvaluarSeleccionProveedor()){
            let datos = {
              TipoQuery : 'sql_saveSeleccionProveedor',
              data:generateInsertData(Maindata),
              criterio:[pregunta1,pregunta2,pregunta3]             
            };                
           appAjaxQuery(datos,rutaSQL).done(function(resp){   
                              
              $( ".boxescolors" ).remove();
                ResetAndUpdateGrid(Maindata,updateGrid,"gridHistoriaSeleccionProveedorGrid");
                ResetAndUpdateGrid(MaindataSelect);
                swal("Insertado correctamente", {
                  icon: "success",
                });   
                               
            }); 
          }       
    }
  }

  function loadSelectProveedorFull(){
    let datos = {
      TipoQuery : 'sqlProveedorInactives'
    };                
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $('.CriterioEvaluacionSelectProveedor option').remove();
    $('.CriterioEvaluacionSelectProveedor').append($("<option>", {
        value: "-1",
        text: "Selecciona...",  
    }));
        resp.data.forEach((item)=>{
          $('.CriterioEvaluacionSelectProveedor').append($("<option>", { 
            value: item.id,
            text : item.nombre 
        }));
        })
       
    }); 
  
  }
  function loadSelectEvaluarProveedorFull(){
    let datos = {
      TipoQuery : 'sqlProveedorActives'
    };                
   appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $('.CriterioEvaluacionEvaluarSelectProveedor option').remove();
    $('.CriterioEvaluacionEvaluarSelectProveedor').append($("<option>", {
        value: "-1",
        text: "Selecciona...",  
    }));
        resp.data.forEach((item)=>{
          $('.CriterioEvaluacionEvaluarSelectProveedor').append($("<option>", { 
            value: item.id,
            text : item.nombre 
        }));
        })
       
    }); 
  
  }
  loadSelectProveedorFull();
  function NuevaSeleccionProveedor(){
    $("#HistorialProveedor").hide();
    $("#NuevoRegistroProveedor").hide();
    $("#NuevaCategoriaProveedor").hide();
    $("#NuevaSeleccionProveedor").show();
    $("#NuevaEvaluacionProveedor").hide();
    //loadSelectProveedorFull();
    $("#link_HistorialProveedor").removeClass("active");
    $("#link_NuevaCategoriaProveedor").removeClass("active");
    $("#link_NuevaSeleccionProveedor").addClass("active");
    $("#link_NuevaEvaluacionProveedor").removeClass("active");
    $("#link_NuevoRegistroProveedor").removeClass("active");
  }
  function HistorialProveedor(){
  
    $("#HistorialProveedor").show();
    $("#NuevoRegistroProveedor").hide();
    $("#NuevaCategoriaProveedor").hide();
    $("#NuevaSeleccionProveedor").hide();
    $("#NuevaEvaluacionProveedor").hide();

    updateGrid("gridProveedorGrid");

   $("#link_HistorialProveedor").addClass("active");
   $("#link_NuevaCategoriaProveedor").removeClass("active");
   $("#link_NuevaSeleccionProveedor").removeClass("active");
   $("#link_NuevaEvaluacionProveedor").removeClass("active");
   $("#link_NuevoRegistroProveedor").removeClass("active");
  }
  function NuevoRegistroProveedor(){
    
    $("#HistorialProveedor").hide();
    $("#NuevoRegistroProveedor").show();
    $("#NuevaCategoriaProveedor").hide();
    $("#NuevaSeleccionProveedor").hide();
    $("#NuevaEvaluacionProveedor").hide();
    //loadSelectProveedorCategory();
    //loadProveedorGroup();
    //loadDepartamentos(ubigeo, "slct_departamento_proveedor");

    $("#link_HistorialProveedor").removeClass("active");
    $("#link_NuevaCategoriaProveedor").removeClass("active");
    $("#link_NuevaSeleccionProveedor").removeClass("active");
    $("#link_NuevaEvaluacionProveedor").removeClass("active");
    $("#link_NuevoRegistroProveedor").addClass("active");
  
  }
  loadSelectProveedorCategory();
  loadProveedorGroup();
  loadDepartamentos(ubigeo, "slct_departamento_proveedor");

  function NuevaCategoriaProveedor(){
    $("#HistorialProveedor").hide();
    $("#NuevoRegistroProveedor").hide();
    $("#NuevaCategoriaProveedor").show();
    $("#NuevaSeleccionProveedor").hide();
    $("#NuevaEvaluacionProveedor").hide();

    updateGrid("gridProveedorCategory");

    $("#link_HistorialProveedor").removeClass("active");
    $("#link_NuevaCategoriaProveedor").addClass("active");
    $("#link_NuevaSeleccionProveedor").removeClass("active");
    $("#link_NuevaEvaluacionProveedor").removeClass("active");
    $("#link_NuevoRegistroProveedor").removeClass("active");
  }
   loadSelectEvaluarProveedorFull();
  function NuevaEvaluacionProveedor(){
    $("#HistorialProveedor").hide();
    $("#NuevoRegistroProveedor").hide();
    $("#NuevaCategoriaProveedor").hide();
    $("#NuevaSeleccionProveedor").hide();
    $("#NuevaEvaluacionProveedor").show();
   // loadSelectEvaluarProveedorFull();
    $("#link_HistorialProveedor").removeClass("active");
    $("#link_NuevaCategoriaProveedor").removeClass("active");
    $("#link_NuevaSeleccionProveedor").removeClass("active");
    $("#link_NuevaEvaluacionProveedor").addClass("active");
    $("#link_NuevoRegistroProveedor").removeClass("active");
  }
  function addItemRequerimiento(tableItemRequerimiento){
    let idx=1;
    let element =$('#'+tableItemRequerimiento+' > tbody > tr').last();
    if(element.length){
      let lastEle=element.find(".txt_item_requerimiento").val()
      idx=Number(lastEle)+1
  
    }

    $('#'+tableItemRequerimiento+' > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='ItemsRemoveRequerimientoRow'>"+
    "<td><input type='text' class='obligatory-input form-control txt_item_requerimiento' disabled value='"+idx+"'/></td>"+
    "<td><input type='text' class='form-control txt_codigo_requerimiento' /></td>"+
    "<td><input type='text' class='form-control txt_n_parte_requerimiento' /></td>"+
    "<td><input type='text' class='obligatory-input form-control txt_descripcion_requerimiento' /></td>"+
    "<td><input type='text' class='obligatory-input form-control txt_cantidad_requerimiento' /></td>"+
    "<td><input type='text' class='obligatory-input form-control txt_unidad_requerimiento' /></td>"+
    //"<td><input type='text' class='obligatory-input form-control txt_prioridad_requerimiento' /></td>"+
    "<td><input type='text' class='form-control txt_observacion_requerimiento' /></td>"+
"<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+ 
  "</div></td>"+
"</tr>")
  }
  function addComentario(element,classSelect){
    $('#'+element+' > tbody').append( "<tr id='"+(new Date()).getTime()+"'><td><input type='text' class='form-control' /></td>"+
    "<td>"+
    "<select  class='form-control "+classSelect+"-1'>"+
    "<option value='-1'>Selecciona..."+
    "</option>"+
    "<option value='1'>1"+
    "</option>"+
    "<option value='2'>2"+
    "</option>"+
    "<option value='3'>3"+
    "</option>"+
  "</select>"+
  "</td>"+
  "<td>"+
  "<select  class='form-control "+classSelect+"-2'>"+
  "<option value='-1'>Selecciona..."+
  "</option>"+
  "<option value='1'>1"+
  "</option>"+
  "<option value='2'>2"+
  "</option>"+
  "<option value='3'>3"+
  "</option>"+
"</select>"+
"</td>"+
"<td>"+
"<select  class='form-control "+classSelect+"-3'>"+
"<option value='-1'>Selecciona..."+
"</option>"+
"<option value='1'>1"+
"</option>"+
"<option value='2'>2"+
"</option>"+
"<option value='3'>3"+
"</option>"+
"</select>"+
"</td>"+
"<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+ 
  "</div></td>"+
"</tr>")
  }
  
  function searchSolicitanteReqCompra(){
    var msn=$('#txt_search_solicitanteReqCompra').val();
    let datos = {
      TipoQuery : '02_search_solicitante',
      value:msn     
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el DNI", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

        $("#txt_solicitante_requerimiento").val(resp.tabla.id);
        $('#txt_solicitante_nombres_reqCompra').val(resp.tabla.nombres);
        $('#txt_solicitante_apellidos_reqCompra').val(resp.tabla.apellidos);
       // $('#txt_solicitante_pretencion_salarial').val(resp.tabla.pretencion_salarial);
      //  $('#txt_solicitante_dni').val(resp.tabla.dni);
      }
    });
  }
    
  function searchFuncionForNameAndSurname(inputsearch,sql,inputtext){
    var msn=$('#'+inputsearch).val();
    let datos = {
      TipoQuery : sql,
      value:msn     
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el DNI", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

        $("#"+inputtext[0]).val(resp.tabla.id);
        $('#'+inputtext[1]).val(resp.tabla.nombres);
        $('#'+inputtext[2]).val(resp.tabla.apellidos);    
      }
    });
  }
  function searchFuncionForNameAndSurnameOrdenCompra(inputsearch,sql,inputtext,tableId,nameInput){
    var msn=$('#'+inputsearch).val();
    
    let datos = {
      TipoQuery : sql,
      value:msn     
    };      
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el codigo ingresado o aún la Orden Compra no ha sido Emitida", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

        $("#"+inputtext[0]).val(resp.tabla[0].id);
        $('#'+inputtext[1]).val(resp.tabla[0].id);
        $('#'+inputtext[2]).val(resp.tabla[0].descripcion);    
        
        $('#'+tableId+' > tbody').empty();

        let tr="";
        resp.tabla.forEach((ele)=>{  
            tr+="<tr>"        
            tr+="<td>"+ele.codigo_parte+"</td>"
            tr+="<td>"+ele.descripcion+"</td>"
            tr+="<td>"+ele.prioridad+"</td>"
            tr+="<td>"+ele.cantidad+"</td>"  
            tr+="<td>"+ele.cumplidos+"</td>"  
            tr+="<td><input type='radio' name='"+nameInput+"' id='"+ele.id_item+"'/></td>"           
            tr+="</tr>"
        })              
        $('#'+tableId+' > tbody').append(tr)
      }
    });
  }
  function searchSolicitante(){
    var msn=$('#txt_search_solicitante').val();
    let datos = {
      TipoQuery : '02_search_solicitante',
      value:msn     
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el DNI", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

        $("#idsolicitanteHidden").val(resp.tabla.id);
        $('#txt_solicitante_nombres').val(resp.tabla.nombres);
        $('#txt_solicitante_apellidos').val(resp.tabla.apellidos);
       // $('#txt_solicitante_pretencion_salarial').val(resp.tabla.pretencion_salarial);
       // $('#txt_solicitante_dni').val(resp.tabla.dni);
      }
    });
  }
  function gridSecondRequerimientos(){
    let datos = {
        TipoQuery : '01_gridRequerimientosPersonas',
        data: 'Logística'
      };
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
        if(resp.tabla.length>0){      
         table= $('#grd01RequerimientosHistorial').DataTable( {         
            "sPaginationType": "simple",
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            
            data: resp.tabla,
            destroy: true,
            columns: 
            [
             
                { data: "id"},          
                { data: "nombres" },
                { data: "cargo" },                        
                { data: "area" },
                { data: "fecha" },
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {
                    
                    //  $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_requerimientoPersona('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteRequerimientoPersona('+oData.id+')">');
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_requerimientoPersona('+oData.id+')"></button>');
                  }
                }
              }
            ]
        }
         );     
        
         table.columns().eq( 0 ).each( function ( colIdx ) {
           
          var parent= $("#RegistroRequerimientosPersonasSearch");      
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
        }   
      });
      
}
function validarcamposNuevoRegistroPersonas(){
    
  let error=0;
    let data={
        id: $('#idsolicitanteHidden').val(),
        cargo: $('#txt_cargo_personas').val(),
        vacante: $('#txt_n_vacantes_personas').val(),

        area: $('#personas_select_area').val(),
        contrato: $('#personas_select_contrato').val(),      
        motivo: $('#personas_select_motivo').val(),

        lugar: $('#personas_select_lugar').val(),
        duracion: $('#personas_select_duracion').val(),
        fecha: $('#txt_fecha_g_personas').val(),

        remuneracion: $('#personas_remuneracion').val(),
     
    }   
    $(".error").remove();  
    if (!data.id.length) {  
        $('#idsolicitanteHidden').after('<span class="error">Este campo es requerido</span>');  
        error=1;  
        }  
      if (!data.cargo.length) {  
      $('#txt_cargo_personas').after('<span class="error">Este campo es requerido</span>');  
      error=1;

      }  
      if (!data.vacante.length) {  
      $('#txt_n_vacantes_personas').after('<span class="error">Este campo es requerido</span>');  
      error=1;

      }  
    if (data.area=="-1") {  
      $('#personas_select_area').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (data.contrato=="-1") {  
      $('#personas_select_contrato').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (data.motivo=="-1") {  
        $('#personas_select_motivo').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  

    if (data.lugar=="-1") {  
      $('#personas_select_lugar').after('<span class="error">Este campo es requerido</span>'); 
      error=1; 
    }  


    if (!data.duracion.length) {  
        $('#personas_select_duracion').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
    if (!data.remuneracion.length) {  
      $('#personas_remuneracion').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
  
    return error;
  }
  function UtilLoadSelect(sql,component){
    let datos = {
      TipoQuery : sql,
      data:{
          param:''
      }   
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
    console.log(resp)
    $.each(resp, function(i, item) {
      $('#'+component).append($("<option>", {
          value: item.id,
          text: item.descripcion,    
      }));
    });
  });

  }
  function resetCapacitacionFieldsPersonas(){  
    
    $("#idsolicitanteHidden").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_cargo_personas").val("");
    $("#txt_n_vacantes_personas").val("");

    $("#personas_select_area").val("-1");
    $("#personas_select_contrato").val("-1");
    $("#personas_select_motivo").val("-1");
    $("#personas_select_lugar").val("-1");

    $("#personas_select_duracion").val("");

    $("#txt_fecha_g_personas").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#personas_remuneracion").val("");


    $("#txt_solicitante_nombres").val("");
    $("#txt_solicitante_apellidos").val("");
    $("#txt_solicitante_area").val("");
    $("#txt_solicitante_cargo").val("");

    $(".class_add_observaciones_personas").remove();
  
  }
  function insert_registro_personas(){
    let datos = {
      TipoQuery : 'sql_get_last_requerimiento_personal'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){   
  
  //  console.log(dat.tabla.id)
   // let id=(new Date()).getTime();
    let id=Number(dat.tabla.id)+1;
    if(validarcamposNuevoRegistroPersonas()){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{          
                     
          var observaciones=$('#table_observaciones_personas > tbody').find(".observaciones_personas").map(function(){return $(this).val();}).get();    
     
          let datos = {
            TipoQuery : '03_save_register_people',
            data:{
              id:"RQ-CM-P-2022-"+id,
              id_personal: $('#idsolicitanteHidden').val(),
              cargo: $('#txt_cargo_personas').val(),
              n_vacantes: $('#txt_n_vacantes_personas').val(),
    
              area: "5",
              contrato: $('#personas_select_contrato').val(),      
              id_motivo: $('#personas_select_motivo').val(),
    
              lugar_trabajo: $('#personas_select_lugar').val(),
              duracion_trabajo: $('#personas_select_duracion').val(),
              fecha_incorporacion: $('#txt_fecha_g_personas').val(),
    
              remuneracion: $('#personas_remuneracion').val(),
              observaciones:observaciones,
             
            },
          };    
        console.log(datos)
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
          swal("Se ha registrado correctamente", {
            icon: "success",
          });
          updateGrid("gridRequerimientoPersonalGrid");
          resetCapacitacionFieldsPersonas();         
                             
          });             
       }

      }); 
  }
  function resetCapacitacionFieldsPersonas(){  
    
    $("#idsolicitanteHidden").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_cargo_personas").val("");
    $("#txt_n_vacantes_personas").val("");

    //$("#personas_select_area").val("-1");
    $("#personas_select_contrato").val("-1");
    $("#personas_select_motivo").val("-1");
    $("#personas_select_lugar").val("-1");

    $("#personas_select_duracion").val("");

    $("#txt_fecha_g_personas").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#personas_remuneracion").val("");


    $("#txt_solicitante_nombres").val("");
    $("#txt_solicitante_apellidos").val("");
    $("#txt_solicitante_area").val("");
    $("#txt_solicitante_cargo").val("");

    $(".class_add_observaciones_personas").remove();
  
  }
  function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function removeComentarios(id){
    swal({    
      text: "¿Deseas Eliminar?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $( "#"+id ).remove();        
      }
    });
  
  }
  function modalGestionPersonas(id){
 
  
    let datos = {
      TipoQuery : '01_gridRequerimientoGestionPersonal',
      value:id    
    };  
       
    appAjaxQuery(datos,rutaSQL).done(function(resp){
        console.log(resp)
  
        $('#txt-modal-gestion-personas-vacante-search').val();
        $('#table_gestion_personas_vacante_list > tbody').empty();
        $('#table_gestion_personas_vacante_list_observaciones > tbody').empty();
       // $('#button_add_gestion_personas_vacante').hide();
  
       $("#txt-modal-gestion-personas-nombre").val(resp.tabla.nombre_solicitante
        )
        $("#txt-modal-gestion-personas-apellido").val(resp.tabla.apellido_solicitante); 
  
        $("#txt-modal-gestion-personas-area").val(resp.tabla.area); 
        $("#txt-modal-gestion-personas-cargo").val(resp.tabla.cargo); 
        $("#txt-modal-gestion-personas-motivo").val(resp.tabla.motivo); 
        $("#txt-modal-gestion-personas-vacantes").val(resp.tabla.vacantes); 
        $("#txt-modal-gestion-personas-estado").val(resp.tabla.estado); 
     
  
        
      let tr="";

      if(resp.tabla1.length){
        resp.tabla1.forEach((ele)=>{
          tr+="<tr id='"+(new Date()).getTime()+"'>"
          tr+="<td>"+ele.nombre+"</td>"
          tr+="<td>"+ele.apellido+"</td>"
          tr+="<td>"+ele.dni+"</td>"
          tr+="<td>"+ele.cargo+"</td>"  
          tr+="</tr>"
      })      
      }else{
        tr="<tr><td colspan='5' style='color:red;text-align:center'>No hay personal asociado al requerimiento</td></tr>"
      }
    
 
 
      $('#table_gestion_personas_vacante_list > tbody').append(tr)


      let tr1="";

      if(resp.tabla2.length){
        resp.tabla2.forEach((ele)=>{
          tr1+="<tr id='"+((new Date()).getTime()+1)+"'>"
          tr1+="<td>"+ele.descripcion+"</td>"    
          tr1+="</tr>"
      })
      }else{
        tr1="<tr><td colspan='1' style='color:red;text-align:center'>No hay observaciones</td></tr>"
      }
    
      
 
 
      $('#table_gestion_personas_vacante_list_observaciones > tbody').append(tr1)


    $('#modal_gestionPersonas').modal('show');
  
    } ); 
  }


  function ModalAddComponentIntoVehicle(){
 
  
   // let datos = {
   //   TipoQuery : '01_gridRequerimientoGestionPersonal',
   //   value:id    
   // };  
       
  //  appAjaxQuery(datos,rutaSQL).done(function(resp){
      
      $('#modalAddComponentIntoVehicle').modal('show');
  
  //  } ); 
  }
  function updateGrid(grid){
    switch (grid) {  
      case "gridRequerimientoPersonalGrid":
        generateGrid(
          "01_gridRequerimientosPersonas",
          "gridRequrimientoPersonalLogisticahtml",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"modalGestionPersonas"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchRequrimientoPersonalLogisticahtml",[            
            "ID",         
            "Area",
            "Cargo",
            "Estado"
          ],"1",0
        );
      break; 
      case "gridHistoriaSeleccionProveedorGrid":
        generateGridProveedores(
          "sqlSeleccionProveedorGrid",
          "gridSeleccionProveedorhtml",
          "seleccion",
          "searchSeleccionProveedorhtml",[            
            "ID",         
            "Proveedor 1",
            "Proveedor 2",
            "Proveedor 3"
          ],"1",0
        );
      break; 
      case "gridHistoriaEvaluacionProveedorGrid":
        generateGridProveedores(
          "sqlEvaluacionProveedorGrid",
          "gridEvaluacionProveedorhtml",
          "evaluacion",
         "searchEvaluacionProveedorhtml",[            
            "Proveedor 1",         
            "Proveedor 2",
            "Proveedor 3",
            "Fecha de Evaluacion"
          ],"1",0
        );
      break; 
      case "gridOrdenCompraGrid":
        generateGrid(
          "sqlOrdenDeCompraGrid",
          "gridOrdenDeComprahtml",
          {
            print:{state:1,funct:"generatepdfOrdenCompra"},
            view:{state:1,funct:"OpenModalOrdenCompra"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchOrdenDeComprahtml",[            
            "Nº Orden de Compra",         
            "Nº de Requerimiento",
            "Fecha",
            "Estado"
          ],"1",0
        );
      break;  
      case "gridRequerimientoGrid":
        generateGrid(
          "sqlRequerimientosGrid",
          "gridRequerimientoshtml",
          {
            print:{state:1,funct:"generatepdfRequerimiento"},
            view:{state:1,funct:"OpenModalRequerimiento"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          ["Nº Requerimiento",
          "Area",
          "Prioridad",
          "Estado",
          "Motivo",
          "Fecha"  
          ],"searchRequerimientoshtml",[            
            "Nº Requerimiento",
            "Area",
            "Fecha",
            "Estado"              
          ],null,1,1
        );
      break;   
      case "gridProveedorCategory":
        generateGrid(
          "sqlCategoryProveedorGrid",
          "gridProveedorCategoryhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:"modalDeleteCategoryProveedor"},
          },
          [
  
          ],"searchProveedorCategoryhtml",[            
            "Descripción"          
          ],"1",0
        );
      break;   
      case "gridAlmacenGrid":
        generateGrid(
          "sqlAlmacenGrid",
          "gridAlmacenhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchAlmacenhtml",[
            "N° de Almacen",
            "Descripción",
            "Direccion"          
          ],"1",0
        );
      break;        
      case "gridItemsGrid":
        generateGrid(
          "sqlItemsGrid",
          "gridItemshtml",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"OpenModalViewItemsDetails"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:"modalDeleteItem"},
          },
          [
  
          ],"searchItemshtml",[
            "Activo",
            "Grupo",
            "Clase",
            "Fecha de Adquisicion"
          ],"1",0
        );
      break;   
      case "gridGroupGrid":
        generateGrid(
          "sqlGroupGrid",
          "gridGrouphtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchGrouphtml",[
            "Grupo",
            "Descripcion"         
          ],"1",0
        );
      break;     
      case "gridGroupClassGrid":
        generateGrid(
          "sqlGroupClassGrid",
          "gridGroupClasshtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchGroupClasshtml",[
            "Codigo",
            "Grupo",
            "Descripcion"            
          ],"1",0
        );
      break;      
      case "gridProveedorGrid":
        generateGrid(
          "sqlProveedorGrid",
          "gridProveedorhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:"modalDeleteCategoryProveedor"},
          },
          [
  
          ],"searchProveedorhtml",[
            "Nombre",
            "Categoria",
            "Tipo",
            "Grupo"
          ],"1",0
        );
      break;    
      default:
        break;
    }
  }
  function insert_modal_Orden_compra_2(){

    let Maindata=[      
      {title:"n_orden_requerimiento",element:"txt_n_requerimiento_oc_modal",type:"text",status:1,value:"val"},   
      {title:"n_orden_compra",element:"txt_n_orden_compra_modal",type:"text",status:1,value:"val"},
      {title:"estado",element:"txt_estado_orden_comrpa_modal",type:"select",status:1,value:"selectVal"},
      {title:"subtotal",element:"txt_subtotal_orden_compra_moda",type:"text",status:1,value:"val"},
      {title:"total",element:"txt_total_orden_compra_modal",type:"text",status:1,value:"val"},
      {title:"itemOrdenCompra",element:"tableItemOrdenCompraModalShow",type:"table",status:1,value:"table"},

      {title:"proveedor",element:"txt_proveedor_modal_id_ordencompra",type:"text",status:0,value:"val"},
      {title:"nombre",element:"txt_proveedor_modal_nombre_ordencompra",type:"text",status:0,value:"val"},
      {title:"apellido",element:"txt_proveedor_modal_apellido_ordencompra",type:"text",status:0,value:"val"},

      {title:"condicion",element:"txt_proveedor_modal_condicion_ordencompra",type:"text",status:0,value:"val"},
      {title:"moneda",element:"txt_proveedor_modal_moneda_ordencompra",type:"text",status:0,value:"val"},
      {title:"fecha_emision",element:"txt_proveedor_modal_fecha_emision_ordencompra",type:"text",status:0,value:"val"},
      {title:"fecha_atencion",element:"txt_proveedor_modal_fecha_atencion_ordencompra",type:"text",status:0,value:"val"},
      {title:"tiempo_atencion",element:"txt_proveedor_modal_tiempo_atencion_ordencompra",type:"text",status:0,value:"val"},
      {title:"tiempo_proveedor",element:"txt_proveedor_modal_tiempo_proveedor_ordencompra",type:"text",status:0,value:"val"},
    
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          let test=generateInsertData(Maindata)
          console.log(test);
          let datos = {
            TipoQuery : 'sql_Update_OrdenCompra',
            data:generateInsertData(Maindata)
          };              
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
              $('#ModalOpenOrdenCompra').modal('hide');
              ResetAndUpdateGrid(Maindata,updateGrid,"gridOrdenCompraGrid");
              $("#contentProviderOC").hide();
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function insert_modal_orden_compra(){

    let datos = {
      TipoQuery : 'sql_get_last_orden_compra'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){  

    let id=Number(dat.tabla.id)+1;

    let Maindata=[      
      {title:"n_orden_compra",element:"",type:"text",status:0,value:"OC-CM-2022-"+id},
      {title:"n_requerimiento",element:"txt_n_requerimiento_modal",type:"text",status:1,value:"val"},
      {title:"estado",element:"txt_estado_requerimiento_modal",type:"select",status:1,value:"selectVal"},
     // {title:"fecha",element:"fecha_orden_compra",type:"text",status:0,value:"none"},

      //{title:"estado",element:"estado",type:"text",status:0,value:"none"},      
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          //let test=generateInsertData(Maindata)
         // console.log(test);
          let datos = {
            TipoQuery : 'sql_RequerimientosOrdenCompra_Add',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
              $('#ModalOpenRequerimiento').modal('hide');
              ResetAndUpdateGrid(Maindata,updateGrid,"gridRequerimientoGrid");
              updateGrid("gridOrdenCompraGrid")
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }); 
  }
  function generateColumnsGrid(data,ope,Enabledcolumns){
    let columns=[]
    let num=[
    "file1",
    "file2",
    "file3",
    "file4",
    "file5",
    "file6",
    "file7",
    "file8",
    "file9",
    "file10",
    "file11",
    "file12",
    "file13",
    "file14",
    "file15",
    "file16",
    "file17",
    "file18"]
    if(!Enabledcolumns.length){
      
      data.forEach((ele)=>{  
        console.log(ele.key)
        if(ele.icon==1 &&ele.popup==1){
          let findElemenet=num.find((it)=>it==ele.key)
    
          let val=findElemenet.substring(4)
          //console.log(val)
          columns.push({data:ele.key,title:ele.title,
        fnCreatedCell: function (nTd, sData,oData,iCol) { 
  
           if(sData==="0") {   
                                  
            $(nTd).html('<span class="badge"style="background:#343a40" onClick="showUpdateDataDocument('+oData.id+','+val+')">&nbsp;</span>');
            
          }else if(sData==="1") {            
            $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
          
          }  
            else if(sData==="2") {                    
              $(nTd).html('<span class="badge"style="background:#ffc107" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');
          }  
            else{          
              $(nTd).html('<span class="badge"style="background:#dc3545" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');                 
          }          
        }})
        }else if(ele.icon==1 &&ele.popup==0){
          let findElemenet=num.find((it)=>it==ele.key)
    
          let val=findElemenet.substring(4)
          //console.log(val)
          columns.push({data:ele.key,title:ele.title,
        fnCreatedCell: function (nTd, sData,oData,iCol) { 
  
           if(sData==="0") {   
                                  
            $(nTd).html('<span class="badge"style="background:#343a40" >&nbsp;</span>');
            
          }else if(sData==="1") {            
            $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
          
          }  
            else if(sData==="2") {                    
              $(nTd).html('<span class="badge"style="background:#ffc107">&nbsp;</span>');
          }  
            else{          
              $(nTd).html('<span class="badge"style="background:#dc3545">&nbsp;</span>');                 
          }          
        }})
        }  else{
          columns.push({data:ele.key,title:ele.title})
        }       
      })
    }else{
      data.forEach((ele)=>{
        //let val=Enabledcolumns.find("ID");
        if(Enabledcolumns.findIndex((it)=>it==ele.title)!=-1){
          console.log(ele.icon)
          if(ele.icon){
            columns.push({ddata:ele.key,title:ele.title,
          fnCreatedCell: function (nTd, sData,oData) { 
             if(sData==="0") {   
                                    
              $(nTd).html('<span class="badge"style="background:#343a40">&nbsp;</span>');
              
            }else if(sData==="1") {            
              $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
            
            }  
              else if(sData==="2") {                    
                $(nTd).html('<span class="badge"style="background:#ffc107">&nbsp;</span>');
            }  
              else{          
                $(nTd).html('<span class="badge"style="background:#dc3545">&nbsp;</span>');        
             
            }  
            
          }})
          }else{
            columns.push({data:ele.key,title:ele.title})
          }
          
        }    
      })
    }
    columns.push({data:'id',title:'',
    fnCreatedCell: function (nTd, sData, oData, iRow, iCol) { 
      let dd=sData.toString()
      let contentOpe="";
  
          contentOpe+=ope.print.state?'<button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.print.funct+'("'+dd+'"); type="button"></button>':''
          contentOpe+=ope.view.state?'<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.view.funct+'("'+dd+'");  type="button"></button>':''
          contentOpe+=ope.edit.state?'<button class="fa fa-pencil bg-amber-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.edit.funct+'("'+dd+'"); type="button"></button>':''
          contentOpe+=ope.delet.state?'<button class="fa fa-trash bg-rose-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.delet.funct+'("'+dd+'"); type="button"></button>':''
  
          $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;">'+contentOpe+'</div>');
      
    }})
  
    console.log(columns)
    return columns
  }
  function searchParent(IdparentSearch,dataColumnsEnabled,allCols){   
    let elements="";
    allCols.forEach((ele,idx)=>{
      if(dataColumnsEnabled.findIndex((it)=>it==ele.title)!=-1){
        elements+='<span class="input-group-addon" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"></i></span>'+
        '<input id="'+idx+'" type="text" class="form-control" placeholder="Buscar por '+ele.title+'" />'
      }      
    })
    
    $("#"+IdparentSearch).html(elements);
  }



  function generateGridProveedores(querySQL,IdgridTable,ope,IdparentSearch,searchColumns,params=null,order=1){
    let datos={
      TipoQuery : querySQL,
      value : params,
    }
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
      if(resp.data.length>0){
       //let dataCols=generateColumnsGrid(resp.column,ope,Enabledcolumns);
  
       table= $('#'+IdgridTable).DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.data,        
          destroy: true,
          columns: [
            //{ data: "id" ,title:""},
            { data: "proveedor1" ,title:"Proveedor 1"},
            { data: "proveedor1_puntaje",title:"Puntaje P-1",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {

              if(sData<2){
                $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:red;color:black">PMC</div>')
              }
              else if(sData>=2.0 && sData <=2.25){
                $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:yellow;color:black">PAC</div>')
              }else{
                $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:green;color:black">PEX</div>')
              }             
            }
          },
          { data: "proveedor2" ,title:"Proveedor 2"},
          { data: "proveedor2_puntaje",title:"Puntaje P-2",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {

            if(sData<2){
              $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:red;color:black">PMC</div>')
            }
            else if(sData>=2.0 && sData <=2.25){
              $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:yellow;color:black">PAC</div>')
            }else{
              $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:green;color:black">PEX</div>')
            }             
          }
        },
        { data: "proveedor3",title:"Proveedor 3" },
        { data: "proveedor3_puntaje",title:"Puntaje P-3",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {

          if(sData<2){
            $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:red;color:black">PMC</div>')
          }
          else if(sData>=2.0 && sData <=2.25){
            $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:yellow;color:black">PAC</div>')
          }else{
            $(nTd).html('<div class="boxescolors" style="width:30px;height:20px;background-color:green;color:black">PEX</div>')
          }             
        }
      },
      { data: "fecha",title:"Fecha de Evalución" },
      { data: "id",
      fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
       
          if(oData.id) {    
            if(ope==="seleccion"){
                $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white" type="button" onclick="OpenModalProveedorSeleccionDetails('+oData.id+')  "></button></div>');
            }else{
              $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white" type="button" onclick="OpenModalProveedorEvaluacionDetails('+oData.id+')  "></button></div>');
            }  

          }
            
      }
    }
          ],  
          columnDefs: [
            {            
                className: 'dt-body-center',
                targets: "_all"
            }
          ], 
          order: [[order, "asc"]]
      } );    
          //searchParent(IdparentSearch,searchColumns,dataCols);
          var parent= $("#"+IdparentSearch);      
        //  table.columns().eq( 0 ).each( function ( colIdx ) {    
          var child= parent.find("#0");    
          child.on('keyup', function() {          
                table
                //.columns( [0,2,4] )
                .search(child.val(), false, true)
                .draw();
        })   
  
      //} );   
  
      }else{
        $('#'+IdgridTable).empty()
      }
    });
  }
  function generateGrid(querySQL,IdgridTable,ope,Enabledcolumns,IdparentSearch,searchColumns,params=null,order=1){
    let datos={
      TipoQuery : querySQL,
      value : params,
    }
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
      if(resp.data.length>0){
       let dataCols=generateColumnsGrid(resp.column,ope,Enabledcolumns);
  
       table= $('#'+IdgridTable).DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.data,        
          destroy: true,
          columns: dataCols,  
          columnDefs: [
            {            
                className: 'dt-body-center',
                targets: "_all"
            }
          ], 
          //order: [[order, "desc"]]
          order: []
      } );    
          searchParent(IdparentSearch,searchColumns,dataCols);
          var parent= $("#"+IdparentSearch);      
          table.columns().eq( 0 ).each( function ( colIdx ) {    
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
  
      }else{
        $('#'+IdgridTable).empty()
      }
    });
  }

  function add_GroupClass(){
    let Maindata=[
      {title:"grupo",element:"slct_group_GruposClass",type:"select",status:1,value:"selectVal"},
      {title:"codigo",element:"txt_codigo_GruposClass",type:"text",status:1,value:"val"},
      {title:"descripcion",element:"txt_descripcion_GruposClass",type:"text",status:1,value:"val"},     
      {title:"acro",element:"",type:"text",status:0,value:$("#txt_descripcion_GruposClass").val().substring(0,3)}, 
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          let data=generateInsertData(Maindata)
          data= { ...data, codigo: data.codigo.split('.')[1]}
          console.log(data);
          let datos = {
            TipoQuery : 'sql_saveGroupClass',
            data:data
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridGroupClassGrid");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }

  function addCantidad_items(){
    let Maindata=[
      {title:"grupo",element:"slct_group_add_items",type:"select",status:1,value:"selectVal"},
      {title:"clase",element:"slct_groupClass_add_items",type:"select",status:1,value:"selectVal"},
      {title:"item",element:"slct_items_add_items",type:"select",status:1,value:"selectVal"},     
      {title:"cantidad",element:"txt_cantidad_items_add",type:"text",status:1,value:"val"},
      {title:"",element:"txt_descripcion_items_add",type:"text",status:0,value:"val"},
      {title:"",element:"txt_unidad_medida_items_add",type:"text",status:0,value:"val"}
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
     
          let datos = {
            TipoQuery : 'addCountItemForInventary',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridItemsGrid");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function validateExistsDescripction(sql,value){
    let datos = {
      TipoQuery : sql,
      data:value
    };             
   appAjaxQuery(datos,rutaSQL).done(function(resp){    
        console.log(resp.error);
       $("#error-input-general").val(resp.error)
    }); 

  }
  function add_Groups(){
    let Maindata=[
      {title:"codigo",element:"txt_codigo",type:"text",status:1,value:"val"},
      {title:"descripcion",element:"txt_descripcion",type:"text",status:1,value:"val"},      
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          //validateExistsDescripction("sql_checkDuplicity_group",$("#txt_descripcion").val());

         // console.log($("#error-input-general").val())
          if(!$("#error-input-general").val()){
            let datos = {
              TipoQuery : 'sql_saveGroups',
              data:generateInsertData(Maindata)
            };                
           appAjaxQuery(datos,rutaSQL).done(function(resp){   
                               
                ResetAndUpdateGrid(Maindata,chargeCorrelativeGroup);
                loadSelectGroup();
                loadSelectGroupandGroupClass();
                updateGrid("gridGroupGrid")
                swal("Insertado correctamente", {
                  icon: "success",
                });   
                               
            }); 
          }else{
            swal("Error de Duplicidad.", {
              icon: "error",
            });   
          }
        
    }
  }
  function add_Requerimientos(){

    let datos = {
      TipoQuery : 'sql_get_last_requerimiento'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){   

    console.log(dat.tabla.id)
   // let id=(new Date()).getTime();
    let id=Number(dat.tabla.id)+1;
    let Maindata=[      
      {title:"n_requerimiento",element:"",type:"text",status:0,value:"RQ-CM-2022-"+id},
      {title:"area",element:"slct_area_requerimiento",type:"select",status:1,value:"selectVal"},

      {title:"search",element:"txt_search_solicitanteReqCompra",type:"text",status:1,value:"val"},
      {title:"name",element:"txt_solicitante_nombres_reqCompra",type:"text",status:1,value:"val"},
      {title:"surname",element:"txt_solicitante_apellidos_reqCompra",type:"text",status:1,value:"val"},

      {title:"solicitante",element:"txt_solicitante_requerimiento",type:"text",status:1,value:"val"},
      {title:"fecha_requerimiento",element:"txt_fecha_requerimiento_requerimiento",type:"text",status:1,value:"val"},
      {title:"centro_costo",element:"txt_centro_costo_requerimiento",type:"text",status:0,value:"val"},
      {title:"prioridad",element:"slct_prioridad_requerimiento",type:"select",status:1,value:"selectVal"},
      {title:"motivo",element:"txt_motivo_requerimiento",type:"text",status:1,value:"val"},
      {title:"itemsRequerimiento",element:"tableItemRequerimiento",type:"table",status:1,value:"table"}      
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          //let test=generateInsertData(Maindata)
          //console.log(generateInsertData(Maindata));
          let datos = {
            TipoQuery : 'sql_RequerimientosAndItems',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridRequerimientoGrid");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }); 
  }
  function add_Almacen(){
    let Maindata=[      
      {title:"estado",element:"slct_estado_almacen",type:"select",status:1,value:"select"},
      {title:"descripcion",element:"txt_descripcion_almacen",type:"text",status:1,value:"val"},
      {title:"sede",element:"txt_sede_almacen",type:"text",status:1,value:"val"},
      {title:"direccion",element:"txt_direccion_almacen",type:"text",status:1,value:"val"},
      {title:"referencia",element:"txt_referencia_almacen",type:"text",status:1,value:"val"},
     /* {title:"responsable",element:"txt_resopnsable_almacen",type:"text",status:1,value:"val"},*/
      {title:"telefono",element:"txt_telefono_almacen",type:"text",status:1,value:"val"},
      {title:"departamento",element:"txt_departamento_almacen",type:"select",status:1,value:"select"},
      {title:"provincia",element:"txt_provincia_almacen",type:"select",status:1,value:"select"},      

      {title:"distrito",element:"txt_distrito_almacen",type:"select",status:1,value:"select"}       
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
    
          let datos = {
            TipoQuery : 'sql_saveAlmacen',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridAlmacenGrid");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function add_ProveedorCategoria(){
    let Maindata=[
      {title:"description",element:"txt_categoryProveedorNew",type:"text",status:1,value:"val"}      
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
    
          let datos = {
            TipoQuery : 'sql_saveProveedorCategory',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridProveedorCategory");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function add_Proveedor(){
    let Maindata=[
      {title:"tipo",element:"slct_tipo_proveedor_proveedor",type:"select",status:1,value:"select"},
      {title:"categoria",element:"slct_categoria_proveedor",type:"select",status:1,value:"val"},
      {title:"departamento",element:"slct_departamento_proveedor",type:"select",status:1,value:"select"},
      {title:"provincia",element:"slct_provincia_proveedor",type:"select",status:1,value:"select"},
      {title:"distrito",element:"slct_distrito_proveedor",type:"select",status:1,value:"select"},
      {title:"grupo",element:"slct_grupo_proveedor",type:"select",status:1,value:"selectVal"},
      {title:"clase_grupo",element:"slct_clase_proveedor",type:"select",status:1,value:"selectVal"},
      {title:"ruc",element:"txt_ruc_proveedor_proveedor",type:"text",status:1,value:"val"},
      {title:"razon_social",element:"txt_razonSocial_proveedor",type:"text",status:1,value:"val"},      

      {title:"direccion",element:"txt_direccion_proveedor",type:"text",status:1,value:"val"},    
      {title:"telefono",element:"txt_telefono_proveedor",type:"text",status:1,value:"val"},    
      {title:"celular",element:"txt_celular_proveedor",type:"text",status:1,value:"val"},    
      {title:"correo",element:"txt_correo_proveedor",type:"text",status:1,value:"val"},   
      
      {title:"n_soles",element:"txt_cSoles_proveedor",type:"text",status:0,value:"val"},    
      {title:"cci_soles",element:"txt_ccisSoles_proveedor",type:"text",status:0,value:"val"},    
      {title:"banco_soles",element:"slct_proveedor_banco_soles",type:"select",status:0,value:"select"},  
      {title:"n_dolares",element:"txt_cdolares_proveedor",type:"text",status:0,value:"val"},    
      {title:"cci_dolares",element:"txt_cciscdolares_proveedor",type:"text",status:0,value:"val"},    
      {title:"banco_dolares",element:"slct_proveedor_banco_dolares",type:"select",status:0,value:"select"},  
      {title:"n_detracciones",element:"txt_detracciones_proveedor",type:"text",status:0,value:"val"}, 
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
    
          let datos = {
            TipoQuery : 'sql_saveProveedor',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
              loadSelectEvaluarProveedorFull();
              loadSelectProveedorFull();
              ResetAndUpdateGrid(Maindata,updateGrid,"gridProveedorGrid");
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function checkIfisIntoOR(){
    $("#modaladdItemComponentCheckIfOC").modal();
  }
  function add_ItemsIntoVehicle(){
    let id=(new Date()).getTime();
    let idxC=(new Date()).getTime()-1;

 

    let state=$("#txt_estado_oc_componenttoVehicle").val();
    let Maindata=[
      {title:"id",element:"",type:"text",status:0,value:id},
      {title:"id_component",element:"",type:"text",status:0,value:idxC},
      //{title:"id_item",element:"",type:"text",status:0,value:id},
      {title:"id_grupo",element:"slct_group",type:"select",status:1,value:"selectVal"},
      {title:"id_clase",element:"slct_groupClass",type:"select",status:1,value:"selectVal"},
      {title:"active",element:"txt_codigo_items",type:"text",status:1,value:"val"},
      {title:"correlative",element:"",type:"text",status:0,value:$("#txt_codigo_items").val().split('-')[1]}, 
      {title:"date_acquisition",element:"txt_fecha_items",type:"text",status:1,value:"val"},
      {title:"serie",element:"txt_numero_serie",type:"text",status:0,value:"val"},
      {title:"parte",element:"txt_numero_parte",type:"text",status:0,value:"val"},

      {title:"descripcion",element:"txt_descripcion_items",type:"text",status:1,value:"val"},
      {title:"coloquial",element:"txt_descripcion_coloquial",type:"text",status:0,value:"val"},

      {title:"unidad_medida",element:"txt_unidad_medida_item",type:"text",status:1,value:"val"},
      {title:"marca",element:"txt_marca_item",type:"text",status:1,value:"val"},
      {title:"precio_unitario",element:"txt_precio_item",type:"text",status:1,value:"val"},
     // {title:"marca",element:"txt_marca_item",type:"text",status:1,value:"val"},
     
     
     {title:"condicion",element:"slct_tipo_orden_condicion",type:"select",status:1,value:"select"},
      {title:"garantia",element:"txt_garantia_item",type:"text",status:1,value:"val"},  

      {title:"garantia_inicio",element:"txt_garantia_item_inicio",type:"text",status:1,value:"val"},  
      {title:"garantia_fin",element:"txt_garantia_item_fin",type:"text",status:.0,value:"val"},  

      {title:"sel",element:"txt_estado_oc_componenttoVehicle",type:"select",status:1,value:"select"},
      {title:"id_orden_compra",element:"txt_ordencompra_withvehicle_id",type:"text",status:Number(state),value:"val"},           
      {title:"",element:"txt_ordencompra_withvehicle_search",type:"text",status:0,value:"val"}, 
      {title:"",element:"txt_ordencompra_withvehicle_name",type:"text",status:0,value:"val"},    
      {title:"",element:"txt_ordencompra_withvehicle_surname",type:"text",status:0,value:"val"},
      {title:"id_item",element:"ordencompramodalVehicle",type:"radio",status:Number(state),value:"id"},

      {title:"",element:"txt_ordencompra_vehiclemodal_search",type:"text",status:0,value:"val"},    
      {title:"id_vehiculo",element:"txt_ordencompra_vehiclemodal_id",type:"text",status:1,value:"val"},
      {title:"",element:"txt_ordencompra_vehiclemodal_name",type:"radio",status:0,value:"val"},
      {title:"",element:"txt_ordencompra_vehiclemodal_surname",type:"radio",status:0,value:"val"},


      {title:"sistema",element:"tableItemOrdenComprachecksistem",type:"group",status:1,value:"radio",name:'orcom'}        
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          var data = Array();
          let config;
          if(Number(state)){ 
            $("#griditemsOrdenCompraWithVehicle2 > tbody > tr").each(function(i, v){
                data[i] = Array();
                $(this).children('td').each(function(ii, vv){
                    data[i][ii] = ($(this).text())?$(this).text():$(this).find("input").is(':checked');
                }); 
            })
            let cc=data.map((it)=>{
              let state='E';
              if(it[3]===it[4]){
                state='C';
              }
              else if(Number(it[3])===Number(it[4])+1){
                state='I';
              }
              return state;
            })
            config={
                stateChangeOC:cc.filter(i=>i==='C').length==data.length-1 && cc.filter(i=>i==='I').length===1?true:false,
                stateChangeNumber:Number(data[data.map((it,idx)=>it[5]?idx:-1).findIndex((el)=>el!=-1)][4])+1
            }
          }
          let datos = {
            TipoQuery : 'sql_saveItems2',
            data:generateInsertData(Maindata),
            config:Number(state)?config:{stateChangeOC:null,stateChangeNumber:null}
          };            
          console.log(generateInsertData(Maindata))    
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridItemsGrid");
           //   updateGrid("gridOrdenCompraVehicleModal");
            $("#details_oc_to_componentVehicle").hide();
            $('#griditemsOrdenCompraWithVehicle2 > tbody').empty();

            $(".checksistemavehicleradio:radio").prop("checked", false);

              $('#modalAddComponentIntoVehicle').modal('hide');
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function add_Items(){
    let id=(new Date()).getTime();
    let idxC=(new Date()).getTime()-1;

   
    let state=$("#txt_estado_p_od_pertenece").val();
    let Maindata=[
      {title:"id",element:"",type:"text",status:0,value:id},
      {title:"id_component",element:"",type:"text",status:0,value:idxC},
      {title:"id_item",element:"",type:"text",status:0,value:id},
      {title:"id_grupo",element:"slct_group",type:"select",status:1,value:"selectVal"},
      {title:"id_clase",element:"slct_groupClass",type:"select",status:1,value:"selectVal"},
      {title:"active",element:"txt_codigo_items",type:"text",status:1,value:"val"},
      {title:"correlative",element:"",type:"text",status:0,value:$("#txt_codigo_items").val().split('-')[1]}, 
      {title:"date_acquisition",element:"txt_fecha_items",type:"text",status:1,value:"val"},
      {title:"serie",element:"txt_numero_serie",type:"text",status:0,value:"val"},
      {title:"parte",element:"txt_numero_parte",type:"text",status:0,value:"val"},

      {title:"descripcion",element:"txt_descripcion_items",type:"text",status:1,value:"val"},
      {title:"coloquial",element:"txt_descripcion_coloquial",type:"text",status:0,value:"val"},

      {title:"unidad_medida",element:"txt_unidad_medida_item",type:"text",status:1,value:"val"},
      {title:"marca",element:"txt_marca_item",type:"text",status:1,value:"val"},
      {title:"precio_unitario",element:"txt_precio_item",type:"text",status:1,value:"val"},
    //  {title:"placa",element:"txt_numero_placa",type:"text",status:1,value:"val"},
     // {title:"modelo",element:"txt_modelo_item",type:"text",status:1,value:"val"},
     // {title:"horometro",element:"txt_numero_horometro",type:"text",status:1,value:"val"},
     // {title:"marca",element:"txt_marca_item",type:"text",status:1,value:"val"},
      {title:"condicion",element:"slct_tipo_orden_condicion",type:"select",status:1,value:"select"},
      {title:"garantia",element:"txt_garantia_item",type:"text",status:1,value:"val"},  

      {title:"inicio_garantia",element:"txt_garantia_item_inicio",type:"text",status:1,value:"val"},  
      {title:"fin_garantia",element:"txt_garantia_item_fin",type:"text",status:0,value:"val"},  

      {title:"sel",element:"txt_estado_p_od_pertenece",type:"select",status:1,value:"select"},
      {title:"id_orden_compra",element:"txt_ordencompravehicicle_id",type:"text",status:Number(state),value:"val"},           
      {title:"",element:"txt_ordencompravehicicle_search",type:"text",status:Number(state),value:"val"},  
      {title:"",element:"txt_ordencompravehicicle_codigo",type:"text",status:Number(state),value:"val"},    
      {title:"",element:"txt_ordencompravehicicle_fecha",type:"text",status:Number(state),value:"val"},
      {title:"id_item",element:"ordencompramodal",type:"radio",status:Number(state),value:"id"}       
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{

      var data = Array();
      let config;
      if(Number(state)){
        $("#griditemsOrdenCompraVehicle > tbody > tr").each(function(i, v){
          data[i] = Array();
          $(this).children('td').each(function(ii, vv){
              data[i][ii] = ($(this).text())?$(this).text():$(this).find("input").is(':checked');
          }); 
      })
        let cc=data.map((it)=>{
        let state='E';
        if(it[3]===it[4]){
          state='C';
        }
        else if(Number(it[3])===Number(it[4])+1){
          state='I';
        }
        return state;
        })
        config={
            stateChangeOC:cc.filter(i=>i==='C').length==data.length-1 && cc.filter(i=>i==='I').length===1?true:false,
            stateChangeNumber:Number(data[data.map((it,idx)=>it[5]?idx:-1).findIndex((el)=>el!=-1)][4])+1
        }
      }
     


     
          let datos = {
            TipoQuery : 'sql_saveItems',
            data:generateInsertData(Maindata),
            config:Number(state)?config:{stateChangeOC:null,stateChangeNumber:null}
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridItemsGrid");
              updateGrid("gridOrdenCompraVehicleModal");
              $("#detailsOC_component").hide();
              $("#griditemsOrdenCompraVehicle > tbody").empty();
              $('#modaladdItemComponentCheckIfOC').modal('hide');
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          }); 
    }
  }
  function generateInsertData(data){
    let returnData={}
    data.forEach((it)=>{
      switch(it.value){
        case "val":
          returnData[it.title]=$("#"+it.element).val().trim();
        break;
        case "text":
          returnData[it.title]=$("#"+it.element).text().trim();
        break;
        case "file":
          returnData[it.title]=$("#"+it.element).val().trim();
        break;
        case "select":
          returnData[it.title]=$("#"+it.element+" :selected").text().trim();
        break;
        case "selectVal":
          returnData[it.title]=$("#"+it.element+" :selected").val().trim();
        break;
        case "id":{
          if($('input[name="'+it.element+'"]').length){
            returnData[it.title]=$('input[name="'+it.element+'"]:checked').attr('id')
          }else{
            returnData[it.title]=null
          }   
          break;     
        }                 
        case "radio":
          returnData[it.title]=$('input[name="'+it.name+'"]:checked').attr('id')
        break;
        case "manyinputs":
          returnData[it.title]=$('#'+it.element+' > tbody').find("."+it.child).map(function(){return $(this).val();}).get(); 
        break;
        case "table":{
          let matrix=[]
          let parent=$('#'+it.element).find("tbody > tr");          
           parent.map(function(){ 
            let data= $(this).find("td").children();        
            let row=[]
            data.map(function(){        
              row.push($(this).val());
            })          
            matrix.push(row);         
           });   
          returnData[it.title]=matrix
        }
        break;
        case "none":
        break;
        default:
          returnData[it.title]=it.value
        break;  
      }
    })
    return returnData;
  }

  function validateEvaluation(data){
    let error=0;
    $(".error").remove(); 
    data.forEach((it)=>{
      if(it.status){
        switch(it.type){
          case "select":{
            let ele=$('#'+it.element);
            if(ele.val()==="-1"){
              ele.after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }
          }
          break;
          case "selectArray":{
            let Parent=$('.'+it.element);
            Parent.map(function(){                       
              if($(this).val()==="-1"){
                $(this).after('<span class="error">Este campo es requerido</span>');  
                error=1;
              }
            });           
          }
          break;    
          default:
          break;
  
        }     
        
      }      
    })
    return error;
  }
  function validate(data){
    let error=0;
    $(".error").remove(); 
    data.forEach((it)=>{
      if(it.status){
        switch(it.type){
          case "text":{
            let ele=$('#'+it.element);
            if(!ele.val().length){
              ele.after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }
          }
          break;
          case "radio":{
            let ele=$('input[name="'+it.element+'"]:checked')
            if (ele.length < 1) {
              $('input[name="'+it.element+'"]').after('<span class="error">Alguno de estos campos es requerido</span>');  
              error=1;
            }
           
          }
          break;
          case "file":{
            let ele=$('#'+it.element);
            if(ele.get(0).files.length===0){
              ele.after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }
          }
          break;
          case "select":{
            let ele=$('#'+it.element);
            if(ele.val()==="-1"){
              ele.after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }
          }
          break;
          case "table":{
            let parent=$('#'+it.element).find("tbody > tr");
           // console.log(parent)
           if(parent.length){
            parent.map(function(){ 

            // let data= $(this).find("td").children();
            let data= $(this).find(".obligatory-input");
             data.map(function(){        
              let val=$(this).prop('type');
            //  console.log(val)
                switch (val) {
                  case "text":
                    if(!$(this).val().length){
                      $(this).after('<span class="error">Este campo es requerido</span>');  
                      error=1;
                    }
                  break;
                  case "select-one":
                    if($(this).val()==="-1"){
                      $(this).after('<span class="error">Este campo es requerido</span>');  
                      error=1;
                    }
                  break;
                 /* case "radio":
                    if(!$(this).is(":checked")){
                      $(this).after('<span class="error">Este campo es requerido</span>');  
                      error=1;
                    }
                  break;*/
                  default:
                    break;
                }
             })
            
             /* if($(this).val()==="-1"){
                $(this).after('<span class="error">Este campo es requerido</span>');  
                error=1;
              }*/
            });  
            }else{
              $('#'+it.element).after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }  
          }
          break;
          case "group":{
            let parent=$('#'+it.element).find("tbody > tr");
           // console.log(parent)
            parent.map(function(){ 
             let data= $(this).find("td").children();
             switch (it.value) {
              case 'radio':
                if(!data.is(":checked")){
                  $(this).after('<span class="error">Este campo es requerido</span>');  
                  error=1;
                }
                break;             
              default:
                break;
             }                     
            });   
          }
          break;
          default:
          break;
  
        }     
        
      }      
    })
    return error;
  }
  function OpenModalOrdenCompra(id){
    

    $("#txt_subtotal_orden_compra_moda").val("00.00")
    $("#txt_igv_orden_compra_modal").val("00.00")
    $("#txt_total_orden_compra_modal").val("00.00")

    $("#tableItemOrdenCompraModalShow > tbody").empty()

      console.log(id)
      let datos = {
        TipoQuery : 'sql_get_orden_compra_by_id',
        data:id
      };  
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        console.log(resp)       
        $('#txt_n_requerimiento_oc_modal').val(resp.data[0].n_requerimiento)
        $('#txt_n_orden_compra_modal').val(resp.data[0].n_orden_compra)
        $('#txt_area_orden_compra_modal').val(resp.data[0].area)
        $('#txt_solicitante_orden_compra_modal').val(resp.data[0].solicitante)
        $('#txt_centro_costo_orden_compra_modal').val(resp.data[0].centro_costo)
        $('#txt_fecha_orden_comrpa_modal').val(resp.data[0].fecha_requerimiento)
        $('#txt_prioridad_orden_compra_modal').val(resp.data[0].prioridad)
        $('#txt_motivo_orden_comrpa_modal').val(resp.data[0].motivo)
       

        $('#txt_subtotal_orden_compra_moda').val(resp.data[0].subtotal)
        $('#txt_igv_orden_compra_modal').val((Number(resp.data[0].subtotal)*0.18).toFixed(2))     
        $('#txt_total_orden_compra_modal').val(resp.data[0].total)     

        $('#txt_estado_orden_comrpa_modal').prop('disabled', resp.data[0].estado_orden_compra==10?true:false)
        $('#addbutonMainOrdenCompra').hide();
      
        //console.log(resp.data[0].estado_orden_compra)
     // var values = $.map($('#txt_estado_orden_comrpa_modal option') ,function(option) {            
    //    return option.text
   // });   
   // console.log(resp.data[0].estado_orden_compra)
   // console.log(values)
   // let val=values.findIndex((it)=>it.trim()===resp.data[0].estado_orden_compra.trim())
  //  console.log(val)
    //  $('#txt_estado_orden_comrpa_modal').val(Number(val)-1)     

    if(resp.data[0].estado_orden_compra==10 || resp.data[0].estado_orden_compra==5){
      resp.data.forEach((it,index)=>{
        $("#tableItemOrdenCompraModalShow > tbody").append('<tr>'+
          '<td><input type="text" disabled value="'+it.item+'"/></td>'+
        '<td>'+it.codigo_parte+'</td>'+
        '<td>'+it.n_parte+'</td>'+
        '<td>'+it.descripcion+'</td>'+
        '<td>'+it.cantidad+'</td>'+
        '<td>'+it.unidad_medida+'</td>'+
        '<td>'+it.precio+'</td>'+
        '<td>'+(CalPrice(it.precio,+it.cantidad))+'</td>'+
        '</tr>')
      })

    }else{
      resp.data.forEach((it,index)=>{
        $("#tableItemOrdenCompraModalShow > tbody").append('<tr>'+
          '<td><input type="text" disabled value="'+it.item+'"/></td>'+
        '<td>'+it.codigo_parte+'</td>'+
        '<td>'+it.n_parte+'</td>'+
        '<td>'+it.descripcion+'</td>'+
        '<td id="cantidadordenCompraInputs-'+index+'">'+it.cantidad+'</td>'+
        '<td>'+it.unidad_medida+'</td>'+
        '<td><input type="text" class="form-control inputforordenCompra" id="priceordencomprainputs-'+index+'" onkeyup="keyCalPriceOrdenCompra('+index+')"  /></td>'+
        '<td  class="totalSubTotalPriceOrdenCompra" id="PriceTordenCompraInputs-'+index+'"></td>'+
        '</tr>')
      })
    }
      
        $('#txt_estado_orden_comrpa_modal option[value="5"]').remove();
        if(resp.data[0].estado_orden_compra==5){         
          $('#txt_estado_orden_comrpa_modal').append($("<option>", {
            value: "5",
            text: "ATENDIDO",  
        }))
        $('#txt_estado_orden_comrpa_modal').prop('disabled', true)
        }

        $('#txt_estado_orden_comrpa_modal').val(resp.data[0].estado_orden_compra)      

        $('.inputforordenCompra').prop('disabled',true)
        $("#contentProviderOC").hide();
        $('#ModalOpenOrdenCompra').modal('show');   
  
      } );   
  }



function OpenModalViewItemsDetails(id){


  let datos = {
    TipoQuery : 'sql_items_get_by_id',
    value:id
  };  
  var table;   
  

 
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    console.log(resp);
    if(resp.tabla.grupo==10){
      let datos = {
        TipoQuery : "01_getMainData",  
        value:id
      } 
      $("#content-seguro-vehiculo").empty();
      
      $("#view_descripcion").text("")
      $("#view_placa").text("")
      $("#view_odometro").text("")
      $("#view_estado").text("")
      $("#view_marca").text("")
      $("#view_conductor").text("") 
    
    
      $("#det_categoria").text("")
      $("#det_activo").text("")
      $("#det_descripcion").text("")
      $("#det_marca").text("")
      $("#det_modelo").text("")
      $("#det_anio").text("")
      $("#det_odometro").text("")
      $("#det_propiedad").text("")
      $("#det_propietario").text("")
      $("#det_serie").text("")
      $("#det_motor").text("")
      $("#det_transmision").text("")
      $("#com_tipo").text("")
      $("#com_proveedor").text("")
      $("#com_fecha").text("")
      $("#com_cantidad").text("")
      
      $("#com_total").text("")
     
      $("#pro_proveedor").text("")
      $("#pro_fecha_compra").text("")
      $("#pro_precio").text("")
      $("#pro_fecha_garan").text("")
      $("#pro_notas").text("")
      $("#pro_documentos").text("")
    
      appAjaxQuery(datos,rutaSQL).done(function(resp){
    
    
      
   
    
    
        $("#det_categoria").text(resp.tabla1.id)
        $("#det_activo").text(resp.tabla1.codigo)
        $("#det_serie").text(resp.tabla1.serie)
    
        $("#det_descripcion").text(resp.tabla1.parte)
        $("#det_marca").text(resp.tabla1.clase)
        $("#det_modelo").text(resp.tabla1.grupo)
    
        $("#det_anio").text(resp.tabla1.condicion)
        $("#det_odometro").text(resp.tabla1.inicio_garantia)
        $("#det_propiedad").text(resp.tabla1.fin_garantia)
       
          
        $("#det_unidad_medida").text(resp.tabla1.unidad_medida)
        $("#det_marca").text(resp.tabla1.marca)
        $("#det_precio_unitario").text(resp.tabla1.precio_unitario)
      //  LoadSeguro(resp.tabla5)
    
        $("#com_tipo").text(resp.tabla6.tipo)
        $("#com_proveedor").text(resp.tabla6.proveedor)
        $("#com_fecha").text(resp.tabla6.fecha)
        $("#com_cantidad").text(resp.tabla6.cantidad)
        
    
        $("#com_total").text(resp.tabla6.total)
       
        
        $("#pro_proveedor").text(resp.tabla7.proveedor)
        $("#pro_fecha_compra").text(resp.tabla7.fecha_compra)
        $("#pro_precio").text(resp.tabla7.precio)
        $("#pro_fecha_garan").text(resp.tabla7.fecha_garantia)
        $("#pro_notas").text(resp.tabla7.notas)
        $("#pro_documentos").text(resp.tabla7.documentos)
    
 
    
        chargeTableFlotaIntoVehicle(resp.tabla11,"table_tipo_sistema_11");
        chargeTableFlotaIntoVehicle(resp.tabla12,"table_tipo_sistema_12");
        chargeTableFlotaIntoVehicle(resp.tabla13,"table_tipo_sistema_13");
        chargeTableFlotaIntoVehicle(resp.tabla14,"table_tipo_sistema_14");
        chargeTableFlotaIntoVehicle(resp.tabla15,"table_tipo_sistema_15");
        chargeTableFlotaIntoVehicle(resp.tabla16,"table_tipo_sistema_16");
        chargeTableFlotaIntoVehicle(resp.tabla17,"table_tipo_sistema_17");
    
      });

      $('#ModalViewItemsDetails').modal('show');   
    }else{
      let datos = {
        TipoQuery : "01_getMainComponentData",  
        value:id
      } 
   
   
      $("#modal_item_component_item_codigo").val("")
      $("#modal_item_component_item_descripcion").val("")
      $("#modal_item_component_item_coloquial").val("")
      $("#modal_item_component_item_cantidad").val("")

      $("#modal_item_component_item_grupo").val("")
      $("#modal_item_component_item_clase").val("")
      $("#modal_item_component_item_serie").val("")
      $("#modal_item_component_item_parte").val("")

      $("#modal_item_component_fecha_adquisicion").val("")
      $("#modal_item_component_marca").val("")
      $("#modal_item_component_unidad_medida").val("")
      $("#modal_item_component_precio_unitario").val("")

      $("#modal_item_component_condicion").val("")
      $("#modal_item_component_fin_garantia").val("")
    
    
      appAjaxQuery(datos,rutaSQL).done(function(resp){
    
        console.log(resp)
        $("#modal_item_component_item_codigo").val(resp.tabla1.codigo)
        $("#modal_item_component_item_descripcion").val(resp.tabla1.descripcion)
        $("#modal_item_component_item_coloquial").val(resp.tabla1.coloquial)
        $("#modal_item_component_item_cantidad").val(resp.tabla1.cantidad)

        $("#modal_item_component_item_grupo").val(resp.tabla1.grupo)
        $("#modal_item_component_item_clase").val(resp.tabla1.clase)
        $("#modal_item_component_item_serie").val(resp.tabla1.serie)
        $("#modal_item_component_item_parte").val(resp.tabla1.parte)

        $("#modal_item_component_fecha_adquisicion").val(resp.tabla1.fecha_adquisicion)
        $("#modal_item_component_marca").val(resp.tabla1.marca)
        $("#modal_item_component_unidad_medida").val(resp.tabla1.unidad_medida)
        $("#modal_item_component_precio_unitario").val(resp.tabla1.precio_unitario)

        $("#modal_item_component_condicion").val(resp.tabla1.condicion)
        $("#modal_item_component_fin_garantia").val(resp.tabla1.fin_garantia)   
    
    
      });
      $('#ModalViewItemsComponentsDetails').modal('show'); 

    }    
 })
  
}

function chargeTableFlotaIntoVehicle(data,table){
  $("#"+ table+"> tbody").empty();
  data.forEach((it,index)=>{
    $("#"+ table+"> tbody").append(
    '<tr style="width:100%">'+
    '<td>'+it.active+'</td>'+
    '<td>'+it.clase+'</td>'+
    '<td>'+it.grupo+'</td>'+     
    '<td>'+it.condicion+'</td>'+    
    '<td>'+it.fecha_adquisicion+'</td>'+    
    '<td>'+it.fin_garantia+'</td>'+    
    '</tr>')
  })

}

  function OpenModalRequerimiento(id){
    console.log(id)
    let datos = {
      TipoQuery : 'sql_get_requerimiento_by_id',
      data:id
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)       
      $('#txt_n_requerimiento_modal').val(resp.data[0].n_requerimiento)
      $('#txt_area_requerimiento_modal').val(resp.data[0].area)
      $('#txt_solicitante_requerimiento_modal').val(resp.data[0].solicitante)
      $('#txt_centro_costo_requerimiento_modal').val(resp.data[0].centro_costo)
      $('#txt_fecha_requerimiento_modal').val(resp.data[0].fecha_requerimiento)
      $('#txt_prioridad_requerimiento_modal').val(resp.data[0].prioridad_g)
      $('#txt_motivo_requerimiento_modal').val(resp.data[0].motivo)
      $('#txt_estado_requerimiento_modal').val(resp.data[0].estado)
      $('#txt_tiempo_atencion_requerimiento_modal').val(resp.data[0].tiempo_atencion)
      
      $("#tableItemRequerimientoModalShow > tbody").empty()
      resp.data.forEach((it)=>{
        $("#tableItemRequerimientoModalShow > tbody").append("<tr>"+
        "<td>"+it.item+"</td>"+
        "<td>"+it.codigo_parte+"</td>"+
        "<td>"+it.n_parte+"</td>"+
        "<td>"+it.descripcion+"</td>"+
        "<td>"+it.cantidad+"</td>"+
        "<td>"+it.unidad_medida+"</td>"+
        "<td>"+it.prioridad+"</td>"+
        "<td>"+it.observacion+"</td>"+
        "</tr>")
      })
      if(resp.data[0].estado==12){
        $("#btn-requeriment-save").hide()
        $('#txt_estado_requerimiento_modal').prop('disabled',true)
      }else{
        $("#btn-requeriment-save").show()
        $('#txt_estado_requerimiento_modal').prop('disabled',false)
      }
      $('#ModalOpenRequerimiento').modal('show');   

    } );   
  }
  function ResetAndUpdateGrid(data,func=null,id=null){
    data.forEach((it)=>{
      if(it.status){
        switch(it.value){
          case "val":
            $("#"+it.element).val("");
          break;
          case "text":
            $("#"+it.element).text("");
          break;
          case "file":
            $("#"+it.element).val(null);
          break;
          case "select":
            $("#"+it.element).val("-1");
          break;
          case "selectVal":
            $("#"+it.element).val("-1");
          break;
          case "manyinputs":
            $("."+it.content).remove();
          break;
          case "table":
            $("#"+it.element).find('tbody').children().remove();
          break;
          case "selectArray":
            $("."+it.element).val("-1");
          break;
          case "date":
            $("#"+it.element).val(new Date().toISOString().slice(0, 10));
          break; 
          default:
          break;
        }
  
        
      }else{
        switch(it.value){       
          case "none":
            $("#"+it.element).val("");
          break;
          case "val":
            $("#"+it.element).val("");
          break;
          case "select":
            $("#"+it.element).val("-1");
          break;
          case "manyinputs":
            $("."+it.content).remove();
          break;
          default:
          break;
        }
      }   
    })  
    if(func){
      func(id);
    } 
  }