More
====

An extension provides capability to break the post into teaser and content sections. You can read more about
awesome Bolt CMS built on top of Silex microframework at [Bolt.cm](http://bolt.cm).

Usage
-----

All you have to do to make your post supports 'more' feature is to insert `{# more #}` to any place in your post,
change the index loop and add `{{ record|more('<field_name>') }}` to the listing templates (instead of usual `{{ record.excerpt(...) }}`.

Example
-------

Assume for the simplicity that we have listing.twig only, one content type and the very basic templates:

The post (markdown):

    Hello, this is my awesome post!
    {# more #}

    Hello, More!

listing.twig:

    {% extends 'layout.twig' %}

    {% block content %}
        {% include '_records.twig' %}
        {{ pager() }}
    {% endblock content %}

_records.twig

    {% for article in records %}
        <article>
            <h1 class="title"><a href="{{ article.link }}">{{ article.title }} &rarr;</a></h1>
            {{ article|more('content') }}
        </article>
    {% endfor %}

These will output

    <p>
        Hello, this is my awesome post!
    </p>

on the listing page, and

    <p>
        Hello, this is my awesome post!
    </p>
    <p>
        Hello, More!
    </p>

on the record page