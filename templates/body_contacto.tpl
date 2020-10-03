<article class=" container titleStyle">
    <h1>¿Estás pensando en comprar una Very Mëy?</h1>
    <h2>Dejame tu nombre, tu e-mail y contame que te interesa, y te responderé pronto!</h2>
</article>

<div class="container d-flex justify-content-center">
    <form id="formulario" class="formStyle">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="control-label col-md-4">Nombre:</label>
                <div class="col-md-8">
                    <input type="nombre" class="form-control" id="nombre" placeholder="Escribe aquí tu Nombre">
                </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2" class="control-label col-md-4">E-mail:</label>
            <div class="col-md-8">
                <input type="email" class="form-control" id="e-mail" placeholder="nombre@example.com">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="control-label col-md-4">Comentario:</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
        </div>

        <div class="form-group">
            <div class="item">
                <label class="labelContacto" name="captcha"> Código de Verificación:</label>
                <label class="captchaNumero" id="captchaNumero"></label>
                    <input class="captchaInput" id="captchaInput" type="number" value="" required
                    placeholder="Código" />
                <label class="labelError" id="captchaError"></label>
            </div>
        </div>

        <div class="form-group">
            <button id="btn-enviar" type="submit" class="btn btn-primary" class="btnMey">Enviar!</button>
        </div>
    </form>
</div>
