Vue.config.devtools = true;
const app = new Vue({
    el : "#app_prueba",
    data : {
        elementosSeleccionados : [],
        repetidos : []
    },
    methods : {
        seleccionarElementos : function (param) {
            let valor = parseInt(param.target.value);
            if(!this.elementosSeleccionados.some(item=>item.id === valor) && Number.isInteger(valor)){
                this.elementosSeleccionados.push(
                    {id: valor, nombre_excel :`Elemento : ${valor}`},
                );
            }
            param.target.value = ""

        },
        eliminarElemento : function (param) {
            this.elementosSeleccionados.splice(param,1);
        }
    },
    watch : {
        
    }
});
