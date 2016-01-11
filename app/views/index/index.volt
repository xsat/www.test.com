{{ partial('partials/breadcrumbs') }}

{% if place.name is defined %}
    <h1>
        {{ place.name }}
    </h1>
{% endif %}

{% if place.positions is defined %}
    {% for position in place.getPositionsOrder() %}
        <div class="item-list row">
            <div class="col-md-10 row">
                <div class="col-md-6">
                    <strong>{{ position.rank }}</strong>
                </div>
                <div class="col-md-6">
                    {{ position.name }}
                </div>
            </div>
            {% if position.person %}
                {% if position.person.isPhoto() %}
                    <div class="col-md-2 photo-item">
                        <img class="photo" style="height: 200px;" src="{{ position.person.getPhoto() }}">
                    </div>
                {% endif %}
                <div class="col-md-10 row">
                    <div class="col-md-6">
                        <strong>{{ position.person.rank }}</strong>
                    </div>
                    <div class="col-md-6">
                        {{ position.person.name }} ({{ position.person.getYears() }} років)
                    </div>
                </div>
                {% if position.person.email %}
                    <div class="col-md-10 row">
                        <div class="col-md-6">
                            <strong>Електронна пошта</strong>
                        </div>
                        <div class="col-md-6">
                            {{ position.person.email }}
                        </div>
                    </div>
                {% endif %}
                {% for phone in position.person.getPhonesOrder() %}
                    <div class="col-md-10 row">
                        <div class="col-md-6">
                            <strong>{{ phone.name }}</strong>
                        </div>
                        <div class="col-md-6">
                            {{ phone.number }}
                        </div>
                    </div>
                {% endfor %}
            {% endif %}
        </div>
    {% endfor %}
{% endif %}