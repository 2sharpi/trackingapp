create table posts
(
    id         integer
        constraint posts_pk
            primary key autoincrement,
    title      text    not null,
    slug       text,
    content    text,
    created_by integer not null,
    date_add   text    not null
);

create index posts_slug_index
    on posts (slug);

create unique index posts_slug_uindex
    on posts (slug);
