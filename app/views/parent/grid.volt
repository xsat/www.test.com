<table class="table table-bordered">
    <tr>
        {% for field in fields %}
            <th>
                {{ field }}
            </th>
        {% endfor %}
        <th width="100px">
            Дії
        </th>
    </tr>
    {% for item in items %}
        <tr>
            {% for key, title in fields %}
                <td>
                    {{ item[key] }}
                </td>
            {% endfor %}
            <td width="100px">
                <ul class="list-unstyled buttons">
                    <li>
                        <a href="{{ url(router.getControllerName()~'/edit/'~item['id']) }}" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Редагувати
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(router.getControllerName()~'/delete/'~item['id']) }}" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash"></span> Видалилти
                        </a>
                    </li>
                </ul>
            </td>
        </tr>
    {% endfor %}
</table>