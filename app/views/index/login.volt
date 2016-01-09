<form class="form-horizontal" method="post">
    {% for name, item in form.getElements() %}
        <div class="form-group">
            {{ form.label(name, ['class': 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ form.render(name) }}
                {{ form.message(name) }}
            </div>
        </div>
    {% endfor %}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
               Зайти
            </button>
        </div>
    </div>
</form>