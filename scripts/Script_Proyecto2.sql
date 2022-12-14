PGDMP     )                    x         	   proyecto2    11.8    11.8 A    \           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ]           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ^           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            _           1262    26009 	   proyecto2    DATABASE     ?   CREATE DATABASE proyecto2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Latin America.1252' LC_CTYPE = 'Spanish_Latin America.1252';
    DROP DATABASE proyecto2;
             postgres    false            ?            1259    43009 
   categorias    TABLE     %  CREATE TABLE public.categorias (
    id bigint NOT NULL,
    "catPadre" character varying(255),
    user_id character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    descripcion character varying(255),
    icono character varying(255),
    presupuesto double precision
);
    DROP TABLE public.categorias;
       public         postgres    false            ?            1259    43007    categorias_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categorias_id_seq;
       public       postgres    false    212            `           0    0    categorias_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;
            public       postgres    false    211            ?            1259    42982    cuentas    TABLE     2  CREATE TABLE public.cuentas (
    id bigint NOT NULL,
    user_id character varying(255) NOT NULL,
    moneda_id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    "saldoInicial" double precision NOT NULL,
    icono character varying(255)
);
    DROP TABLE public.cuentas;
       public         postgres    false            ?            1259    42980    cuentas_id_seq    SEQUENCE     w   CREATE SEQUENCE public.cuentas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.cuentas_id_seq;
       public       postgres    false    208            a           0    0    cuentas_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.cuentas_id_seq OWNED BY public.cuentas.id;
            public       postgres    false    207            ?            1259    42959    failed_jobs    TABLE     ?   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         postgres    false            ?            1259    42957    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public       postgres    false    204            b           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
            public       postgres    false    203            ?            1259    26012 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false            ?            1259    26010    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    197            c           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            ?            1259    42998    mis_categorias    TABLE     ?   CREATE TABLE public.mis_categorias (
    id bigint NOT NULL,
    user_id character varying(255) NOT NULL,
    "categoriaP" character varying(255),
    subcategoria character varying(255)
);
 "   DROP TABLE public.mis_categorias;
       public         postgres    false            ?            1259    42996    mis_categorias_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.mis_categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.mis_categorias_id_seq;
       public       postgres    false    210            d           0    0    mis_categorias_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.mis_categorias_id_seq OWNED BY public.mis_categorias.id;
            public       postgres    false    209            ?            1259    42971    monedas    TABLE       CREATE TABLE public.monedas (
    id bigint NOT NULL,
    user_id character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    simbolo character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    tasa double precision NOT NULL
);
    DROP TABLE public.monedas;
       public         postgres    false            ?            1259    42969    monedas_id_seq    SEQUENCE     w   CREATE SEQUENCE public.monedas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.monedas_id_seq;
       public       postgres    false    206            e           0    0    monedas_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.monedas_id_seq OWNED BY public.monedas.id;
            public       postgres    false    205            ?            1259    42950    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false            ?            1259    36770    transaccions    TABLE     t  CREATE TABLE public.transaccions (
    id bigint NOT NULL,
    tipo character varying(255) NOT NULL,
    user_id character varying(255) NOT NULL,
    fecha timestamp(0) without time zone NOT NULL,
    categoria character varying(255) NOT NULL,
    cuenta character varying(255) NOT NULL,
    detalle character varying(255) NOT NULL,
    monto double precision NOT NULL
);
     DROP TABLE public.transaccions;
       public         postgres    false            ?            1259    36768    transaccions_id_seq    SEQUENCE     |   CREATE SEQUENCE public.transaccions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.transaccions_id_seq;
       public       postgres    false    199            f           0    0    transaccions_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.transaccions_id_seq OWNED BY public.transaccions.id;
            public       postgres    false    198            ?            1259    42939    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         postgres    false            ?            1259    42937    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    201            g           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    200            ?
           2604    43012    categorias id    DEFAULT     n   ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);
 <   ALTER TABLE public.categorias ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    211    212    212            ?
           2604    42985 
   cuentas id    DEFAULT     h   ALTER TABLE ONLY public.cuentas ALTER COLUMN id SET DEFAULT nextval('public.cuentas_id_seq'::regclass);
 9   ALTER TABLE public.cuentas ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    207    208            ?
           2604    42962    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    204    204            ?
           2604    26015    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            ?
           2604    43001    mis_categorias id    DEFAULT     v   ALTER TABLE ONLY public.mis_categorias ALTER COLUMN id SET DEFAULT nextval('public.mis_categorias_id_seq'::regclass);
 @   ALTER TABLE public.mis_categorias ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    209    210    210            ?
           2604    42974 
   monedas id    DEFAULT     h   ALTER TABLE ONLY public.monedas ALTER COLUMN id SET DEFAULT nextval('public.monedas_id_seq'::regclass);
 9   ALTER TABLE public.monedas ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    205    206            ?
           2604    36773    transaccions id    DEFAULT     r   ALTER TABLE ONLY public.transaccions ALTER COLUMN id SET DEFAULT nextval('public.transaccions_id_seq'::regclass);
 >   ALTER TABLE public.transaccions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199            ?
           2604    42942    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    201    201            Y          0    43009 
   categorias 
   TABLE DATA               d   COPY public.categorias (id, "catPadre", user_id, tipo, descripcion, icono, presupuesto) FROM stdin;
    public       postgres    false    212   hH       U          0    42982    cuentas 
   TABLE DATA               e   COPY public.cuentas (id, user_id, moneda_id, nombre, descripcion, "saldoInicial", icono) FROM stdin;
    public       postgres    false    208   !I       Q          0    42959    failed_jobs 
   TABLE DATA               [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public       postgres    false    204   ?I       J          0    26012 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   ?I       W          0    42998    mis_categorias 
   TABLE DATA               Q   COPY public.mis_categorias (id, user_id, "categoriaP", subcategoria) FROM stdin;
    public       postgres    false    210   ?J       S          0    42971    monedas 
   TABLE DATA               R   COPY public.monedas (id, user_id, nombre, simbolo, descripcion, tasa) FROM stdin;
    public       postgres    false    206   ?J       O          0    42950    password_resets 
   TABLE DATA               C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    202   =K       L          0    36770    transaccions 
   TABLE DATA               c   COPY public.transaccions (id, tipo, user_id, fecha, categoria, cuenta, detalle, monto) FROM stdin;
    public       postgres    false    199   ZK       N          0    42939    users 
   TABLE DATA               u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    201   ?L       h           0    0    categorias_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categorias_id_seq', 25, true);
            public       postgres    false    211            i           0    0    cuentas_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cuentas_id_seq', 6, true);
            public       postgres    false    207            j           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
            public       postgres    false    203            k           0    0    migrations_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.migrations_id_seq', 180, true);
            public       postgres    false    196            l           0    0    mis_categorias_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.mis_categorias_id_seq', 1, false);
            public       postgres    false    209            m           0    0    monedas_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.monedas_id_seq', 6, true);
            public       postgres    false    205            n           0    0    transaccions_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.transaccions_id_seq', 149, true);
            public       postgres    false    198            o           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 3, true);
            public       postgres    false    200            ?
           2606    43017    categorias categorias_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public         postgres    false    212            ?
           2606    42990    cuentas cuentas_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.cuentas
    ADD CONSTRAINT cuentas_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.cuentas DROP CONSTRAINT cuentas_pkey;
       public         postgres    false    208            ?
           2606    42968    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public         postgres    false    204            ?
           2606    26017    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            ?
           2606    43006 "   mis_categorias mis_categorias_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.mis_categorias
    ADD CONSTRAINT mis_categorias_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.mis_categorias DROP CONSTRAINT mis_categorias_pkey;
       public         postgres    false    210            ?
           2606    42979    monedas monedas_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.monedas
    ADD CONSTRAINT monedas_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.monedas DROP CONSTRAINT monedas_pkey;
       public         postgres    false    206            ?
           2606    36778    transaccions transaccions_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.transaccions
    ADD CONSTRAINT transaccions_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.transaccions DROP CONSTRAINT transaccions_pkey;
       public         postgres    false    199            ?
           2606    42949    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    201            ?
           2606    42947    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    201            ?
           1259    42956    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    202            ?
           2606    42991 !   cuentas cuentas_moneda_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.cuentas
    ADD CONSTRAINT cuentas_moneda_id_foreign FOREIGN KEY (moneda_id) REFERENCES public.monedas(id);
 K   ALTER TABLE ONLY public.cuentas DROP CONSTRAINT cuentas_moneda_id_foreign;
       public       postgres    false    208    2760    206            Y   ?   x?e??? ???at?F=.?/?h<?R??X??????????G??#c??=Hػ???Q]A!?
?i??'z?q?X?r=L%?0D[k??ԐF?C?*:[??&G????ʯRɿ?_ڐ3?Q??;?E?̕?وI?x󡇄??7(??I?pVT-F????OB???}M_?      U   ?   x?]ν!?zy
??¿n?????B?%?????h?D??f2$8?C?ė7*!?o?<??J?Р??ua?c??q?*D+???U?ڢ;???ڀ'?۽?Q񔩤$j1v?[????Q???????ub?=/?6o      Q      x?????? ? ?      J   ?   x????n? F??a&?!?2ɢĭ2?a?T{???$?WEqq>?``t?k ?Gc`t?B??W?)-ye?4?^X??[a??gL??????t8?С???+?1?c??B????B???hƏ|>?M?u?6?.? ??????p??y????x?<?c???[???r?e?-?mw??4?.1??w?{㍗9ͅ??}鏈???oZ?oJZ?      W      x?????? ? ?      S   X   x?3?4?t????K-?|Դ???JITp?/.IT?LN?4?2?q??I,?T?ɇ;r?Xr??\K???z???@??DNss?=... ???      O      x?????? ? ?      L   L  x???Kn?0??9?/@:c??ZU?DU[uՍ??`ņ??$C??@????0?乩??? a??G?? ?Ǜ?qō?d]???t',?e?}?ל.?lA1?A=?R????@??m
???.'kޔ?nx)u?yᵦ??wR	3H??K?"һ?V?J?B?R?;1?P;??F????d?[0)?`
1?$H ¨7??t???B6b???,"?ns?????([?????i9???ff?cr6???MŏM?ƈZiK??[]ssV?ė}e?O??o?1?62?3?[?!?P"?"? @??8`?I??=@k?5???????%Zt?i9???ϕ?y?0???      N     x?m?Ko?@??5?
ng?????c?%nD?E?R?׷څѸ9?'9ɛqu??}e??A?r;??ঃ`g^$?XĨ]d??RF????~?????E÷m?????}??y?N??b?E??5??$??2s?4	ˈ
N?J ?y????+????cJ??)p???k3?J(?3V?L?-?z?/?,Xi&?u!??VcB??!?/@EG?.I???z?=%Tqr????a??ʶ??K??W??}???S??rcJ=?i???pbJ:??=?<??@+v?     