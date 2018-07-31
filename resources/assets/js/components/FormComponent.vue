<div class="container-fluid bg-success" v-show="btnVis">
    <table>
        <tr>
        <td>
            <button class="btn btn-dark">First</button>
        </td>
            <td>
                <button class="btn btn-dark">Second</button>
            </td>
        </tr>
    </table>
</div>

<style>
    .bigger{
        width:150%;
        height:150%;
        font-size:25px;
        transition:0.3s;
    }
</style>

<script>
    export default {
        data(){
            return{
                btnVis: true
            }
        }
    }
</script>