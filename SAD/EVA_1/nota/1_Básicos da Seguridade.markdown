__________________________________________________________
  **(1)**  **Principios Básicos da Seguridade Informática**
==========================================================
> - Confidencialidade, Integridade, Dispoñibilidade e Non Repudio
> - Seguridade Física e Seguridade Lóxica
> - Vulnerabilidades, Ameazas e Ataques
----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 1 ⇓
 </font>
</center>

----------------------------------

Podemos decir que un sistema informático é seguro si garante completamente:

- **A Confidencialidade:**  A información so debe ser accesible por quen teña autorización, polo que é preciso protexer os datos sensibles de accesos non autorizados, normalmente mediante o control de acceso, a autenticación, a autorización e o cifrado.  
- **A Integridade:** Debe garantizarse que a información non sufre modificacións non autorizadas ou accidentais, mantendo a súa exactitude e confiabilidade.  
- **A Dispoñibilidade:** Debe garantirse que os datos están accesibles polos usuarios autorizados sempre que se necesiten.
- **Non Repudio en Orixe:** O autor da información recibida é coñecido cun 100% de seguridade.   
- **Non Repudio en Destiño:** O autor da información ten probas de que a información foi entregada ao receptor.  
  
A **seguridade informática** é o conxunto de prácticas, procesos, tecnoloxías e políticas deseñadas para protexer os sistemas de información e os datos contra ameazas, ataque, danos ou accesos non autorizados. O obxectivo principal da seguridade informática é garantir a confidencialidade, integridade e dispoñibilidade da informaciń e dos sistemas, que forman o que se coñece como tríada CIA  (Confidentiality, Integrity, Availability).

---------------------------------------------
# Compoñentes Clave da Seguridade Informática

## 1. Seguridade das Redes  
**La seguridade das redes** implica a protección da infraestrutura de rede para evitar o acceso no autorizado, o mal uso ou a modificación de datos durante a súa transmisión. Para iso empréganse diferentes medios entre os que destacan:

- **Cortalumes ou devasas (firewalls)**:Dispositivos ou software que filtra o tráfico de rede, permitindo soamente tráfico lexítimo e bloqueando o non autorizado.  
- **Sistemas de detección e prevención de intrusiones (IDS/IPS)**: Monitorean a rede en busca de actividades sospeitosas ou maliciosas e toman medidas para prever ataques.  
- **Segmentación da rede**: Dividir a rede en segmentos máis pequenos para aillar os activos críticos e limitar o alcance dun posible ataque.  

## 2. Seguridad de Sistemas y Dispositivos  
  
Podemos distinguir entre:  

- **seguridade física** que se centra en protexer as persoas, as infraestruturas físicas e os   recursos materiais fronte a ameazas físicas, como intrusións, roubos, vandalismo, desastres naturais e outras situacións que poidan poñer en perigo a integridade dos activos físicos. Este tipo de seguridade inclúe tanto o uso de dispositivos e sistemas como cámaras de vixilancia, alarmas, gardas de seguridade, controis de acceso, portas reforzadas e barreiras físicas (protección de acceso físico), como sistemas de respaldo de enerxía (UPS / SAI), sistemas de detección de incendios ou plans de evacuación (protección contra desastres).
- **seguridade lóxica** que se centra en protexer os sistemas informáticos, datos e redes fronte a ameazas dixitais como accesos non autorizados, ataques cibernéticos, modificacións non autorizadas e perda de información. A seguridade lóxica está enfocada en garantir a integridade, confidencialidade e dispoñibilidade dos recursos informáticos, salvagardando a información de usuarios, empresas ou institucións.
  
Importantes medidas nestes ámbitos son:

- **Parches y actualizaciones**: Mantener los sistemas actualizados con las últimas correcciones de seguridad para prevenir la explotación de vulnerabilidades conocidas.
- **Antivirus y antimalware**: Utilizar software para detectar y eliminar programas maliciosos como virus, ransomware y spyware.
- **End-point security**: Proteger dispositivos individuales como laptops, teléfonos móviles y estaciones de trabajo mediante soluciones como cifrado de disco y autenticación multifactor.
- **Uso de CPD** (Centros de Procesos de Datos, ou Datacenters) que  establecen de xeito eficiente a seguridade física dos sistemas

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 2 ⇓
 </font>
</center>

----------------------------------

## **<font color="yellow">1.1</font>Confiencialidade**

A confidencialidade informática é un dos principios fundamentais da seguridade da información e consiste en protexer os datos de maneira que só as persoas ou entidades autorizadas poidan acceder a eles. O obxectivo da confidencialidade é previr o acceso non autorizado á información, garantindo que non se divulgue a partes non desexadas ou non autorizadas.

# Principios da Confidencialidade Informática
- **Acceso restrinxido**: Só as persoas ou sistemas autorizados deben ter acceso á información sensible.
- **Prevención da divulgación**: A información non debe ser exposta a partes non autorizadas durante o seu almacenamento, procesamento ou transmisión.
- **Protección de datos sensibles**: Datos como información persoal, financeira ou empresarial deben estar adecuadamente protexidos.

# Medios para Garantir a Confidencialidade
Existen varias técnicas e ferramentas que se poden empregar para garantir a confidencialidade da información nun contorno informático. A continuación, explícanse as máis comúns:

## **1. Criptografía** 
A criptografía é o medio máis efectivo para asegurar a confidencialidade dos datos. A transformación dos datos a un formato ilexible (texto cifrado), que só se pode reverter utilizando a chave correcta, coñécese como cifrado.  

Os datos cÍfranse para que só poidan ser lidos ou interpretados por quen posúa a clave de descifrado correspondente.  

- Cifrado simétrico: Utiliza a mesma chave tanto para cifrar como para descifrar os datos. Exemplos de algoritmos son AES (Advanced Encryption Standard) e DES (Data Encryption Standard).
    - Exemplo: Unha base de datos cifrada con AES-256 só pode ser descifrada por persoas que teñan a clave secreta correspondente.  

- Cifrado asimétrico: Emprega un par de chaves, unha pública e unha privada. A clave pública cifra os datos, mentres que a clave privada os descifra. A chave privada debe manterse en absoluto segredo, mentres que a chave pública se da a coñecer a todo o mundo. Entre máis coñecida sexa, mellor. Un exemplo disto é o algoritmo RSA. O principal problema deste sistema e asegurar que a identidade do propietario da chave pública é lexítimo, para o que se utilizan as entidades certificadoras (X509) ou cadeas de confianza (PGP).
Un certificado é un conxunto de información sobre o emisor dunha información xunto coa súa chave pública asinada dixitalmente por un terceiro, que pode ser unha autoridade certificadora (X509), ou un terceiro de confianza (PGP).

## 1.1. Cifrado e Sinadura Dixital
O uso principal da criptografía é o **cifrado de datos** e a **sinadura dixital**. 

O cifrado de datos usa <u>**cifrado simétrico**</u>, que é moi efectivo para cifrar grandes cantidades de información, pero presenta o problema de dar a coñecer  ós destinatarios a chave necesaria para o descifrado  (durante a comunicación da mesma existe un risco serio de interceptación da mesma, compromentendo a seguridade)

O <u>**cifrado asimétrico**</u> soluciona este problema, xa que para cifrar a información basta con empregar a chave pública do destinatario  (que é o único que está en posesión da chave privada correspondente). Previamente debemos asegurarnos de que esa chave pública efectivamente corresponde co destinatario correcto . 

O problema neste caso é que os algoritmos de cifrado de chave asimétrica non son eficientes a hora de cifrar volúmenes grandes de información, sendo apropiados soamente para cifrar información moi breve.

A solución consiste en xerar unha chave de cifrado simétrica aleatoria, cifrar o documento coa chave xerada mediante a chave pública do destinatario e adxuntar ó documento resultante ao documento cifrado (a chave de cifrado e unha información breve facil de cifrar con cifrado asimétrico).

O cifrado asimétrico tamén nos permite asegurar a integridade e autoría dos documentos mediante un procedemento coñecido como **Sinadura ou Firma Dixital**. Este procedemento consiste en calcular un HASH (un número único) a partir da información do documento, cifrar ese hash coa chave privada e adxuntar o resultado ao documento. O receptor pode comprobar a identidade do remitente (a chave pública do remitente descifra o hash) e a integridade do documento (si se recalcula o hash do documento recibido, debe coincidir co hash descifrado).

## 1.2. Protocolos de Comunicación Seguros
Os protocolos de comunicación seguros garanten tanto a autenticidade do orixe da información (non repudio en orixe), a confidencialidade da información transimitida (cifrado) como a integridade da información recibida (o que se transmite é recibido sin ningún tipo de alteración).

E básico que toda a transmisión de información a través de redes públicas faga uso de protocolos seguros. Entre estes protocolos destacan:

- SSH (Secure Shell): Ou secure shell, emprega cifrado asimétrico para establecer comunicacións seguras de terminal remoto, permitindo xestionar un sistema remoto con total seguridade. Posee varios subsistemas de interés como os túneis ssh, o sftp ou sshfs.
- VPN: As VPN (Virtual Private Networks) permite a conexión de un equipo a unha rede remota de xeito seguro.
- HTTPS: A comunicación HTTPS e a base da comunicación na world wide web. O uso de https resulta imprescindible, sendo o protocolo http altamente inseguro sendo susceptible tanto ao phising como a ataque MiM ou a interceptación de información, xa que toda a comunicación HTTP se realiza en texto en claro. O funcionamento do HTTPS é o seguinte:
  1. O cliente indica ao servidor que desexa iniciar unha comunicación HTTPS para unha páxina concreta
  2 .O Servidor envía o seu certificado, que contén a chave pública e a información relevante sobre o site que está a visitar o cliente xunto coa súa chave pública asinada por unha entidade certificadora.
  1. O cliente recibe o certificado e comproba a sinadura dixital utilizando as chaves públicas das entidades certificadoras existentes na súa base de datos (das que se fía). Si a sinadura non corresponde con ningunha delas amosa unha mensaxe para que o cliente decida si quere correr o risco de establecer a comunicación, sabendo que non existe ningunha garantía de que o site visitado sexa o site lexítimo. Si a sinadura coincide, se comproba a validez do certificado (si non foi anulado ou está caducado) e se descifra a chave pública do site.
  2. O cliente crea unha chave de cifrado simétrico longa, a cifra coa chave pública do site e a envía.
  3. O site recibe a chave de cifrado para a comunicación, a descifra coa súa chave privada e envía o contido cifrado.
  4. O cliente recibe o contido e o descifra coa chave de cifrado.
  - A partir dese momento todo intercambio de información será cifrado mediante a chave de cifrado que xa teñen as dúas partes. Este esquema e similar en todos os protocolos seguros.:

## 1.3. Seguridade na Nube
A confidencialidade en contornos de computación na nube require medidas adicionais para protexer os datos almacenados en servizos externos, xa que "a nube" non é mais que unha rede de sistemas que pertence a un terceiro que ten pleno control sobre a mesma. Se debe:

- Establecer Cifrado de datos en repouso e en tránsito: Os datos cifranse tanto cando están almacenados na nube como cando se transmiten entre o usuario e o provedor do servizo na nube.
- Xestión de chaves: É fundamental que as chaves criptográficas utilizadas para cifrar os datos na nube estean baixo control do cliente, asegurando que só os usuarios autorizados poidan descifrar os datos.

## **2. Control de Acceso**
O control de acceso refírese á implementación de medidas que aseguran que só as persoas autorizadas poidan acceder aos sistemas e á información. O control de acceso trata varios aspectos:


- **Identificación e Autenticación**: Consiste en establecer a identidade dun usuario e verificar a súa autenticidade. Isto pode incluír contrasinais, autenticación multifactor (2FA ou superiores) ou biometría.

- **Autorización**: Define os permisos dun usuario despois de ser autenticado, asegurando que só poidan realizar accións para as que están autorizados.

## **3. Políticas de Seguridade**
O establecemento de políticas de seguridade axuda a controlar quen ten acceso á información e como se manexa esta información dentro dunha organización. Para establecer políticas de seguridade eficientes é necesario:

- **Clasificación da información**: A información clasifícase segundo o seu nivel de sensibilidade (confidencial, interna, pública), e aplícanse diferentes controis de acceso en función desta clasificación.

- **Capacitación**: Asegurar que os empregados comprendan as políticas de confidencialidade e como implementar medidas de seguridade adecuadas.cos de phishing.

## **4. Destrución Segura de Datos**
Cando os datos xa non son necesarios, deben eliminarse de maneira segura para garantir que non poidan ser recuperados por persoas non autorizadas.

- **Borrado seguro**: Os datos sobrescríbense varias veces antes de que o dispositivo ou os ficheiros sexan eliminados, de xeito que non sexa posible físicamente a recuperación dos datos.
- **Cifrado de ficheiros antes da súa eliminación**: En certos casos, os ficheiros cifranse antes de ser eliminados para que, incluso se se recuperan, non poidan ser lidos sen a clave de descifrado.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 3 ⇓
 </font>
</center>

----------------------------------
## **<font color="yellow">1.2</font> Integridade**

A Integridade se refire a garantía de que a información elaborada polo emisor chega sin ningún cambio ao receptor.

Para ofrecer esta garantía habitualmente se recurre a sistemas de cifrado de dirección única, na que a  partir da información se xenera un identificador único (hash) que pode ser comprobado na recepción contra a información recibida.  

Este tipo de sistemas se empregan de xeito extensivo na instalación de software ou nos sistemas de control de integridade establecidos para a información almacenada.  

## **1.2.1. Os HASH**
Un **hash** é un proceso mediante o cal unha entrada de datos, de lonxitude arbitraria, é transformada mediante unha función nunha cadea de caracteres de lonxitude fixa, que se denomina **valor hash**, código hash ou simplemente **hash**. Esta transformación é irreversible, o que significa que non se pode reconstruír a entrada orixinal a partir do hash resultante. As funcións hash son fundamentais en moitos ámbitos da informática, sobre todo en seguridade, criptografía, bases de datos e estruturas de datos como as táboas hash.

### Características principais dos HASH
1. **Determinismo**: A mesma entrada sempre xerará o mesmo valor hash.
2. **Irreversibilidade**: Non é posible calcular a entrada orixinal a partir do hash, o que o fai útil para seguridade.
3. **Lonxitude fixa**: A saída dunha función hash sempre ten unha lonxitude fixa, independentemente do tamaño da entrada. Por exemplo, o algoritmo SHA-256 sempre produce un valor hash de 256 bits (32 bytes).
4. **Difusión (Avalancha)**: Un pequeno cambio na entrada produce un cambio drástico no valor hash.
5. **Non colisións**: Idealmente, non debería ser posible que dúas entradas diferentes xeren o mesmo hash. Cando isto ocorre, chámaselle **colisión**.

## Uso habitual dos HASH
1. **Integridade de datos**:
Os hashes utilízanse para comprobar se os datos foron alterados. Por exemplo, cando se descarga un ficheiro de Internet, moitas veces publícase o seu hash para que o usuario poida calcular o hash do ficheiro descargado e comparalo co publicado. Se coinciden, os datos non foron alterados.

2. **Autenticación e contrasinais**:
En lugar de almacenar contrasinais en texto plano nunha base de datos, almacénanse os seus hashes. Cando un usuario introduce o seu contrasinal, a aplicación calcula o hash dese contrasinal e compárao co que está almacenado. Deste modo, mesmo se a base de datos é comprometida, os contrasinais non serán facilmente accesibles.

3. **Criptografía**:
En criptografía, as funcións hash criptográficas úsanse para xerar sinaturas dixitais, que permiten verificar a autenticidade e a integridade dunha mensaxe ou documento.

4. **Táboas hash**:
As táboas hash son estruturas de datos que permiten buscar información rapidamente. Un hash calcúlase para cada elemento e o valor resultante utilízase como un índice nunha táboa ou array, facilitando así a localización rápida dun elemento.

5. **Blockchain**:
Nunha blockchain, os hashes utilízanse para ligar os bloques entre si e garantir a integridade dos datos. Cada bloque contén o hash do bloque anterior, o que fai case imposible alterar os datos dunha blockchain sen ser detectado.

## **Tipos de HASH**
1. **Funcións hash criptográficas**: Estas funcións están deseñadas para ser seguras e difíciles de inverter ou provocar colisións, polo que son amplamente usadas en criptografía e seguridade. Algúns exemplos son:

   - **MD5 (Message Digest 5)**: Unha función hash popular nos anos 90, que produce un hash de 128 bits (16 bytes). Actualmente considérase insegura debido ás colisións coñecidas.
   - **SHA-1 (Secure Hash Algorithm 1)**: Función que produce un hash de 160 bits. Foi amplamente utilizada pero tamén se demostrou insegura, polo que a súa utilización está a ser substituída.
   - **SHA-2** (incluíndo **SHA-256**, **SHA-512**, etc.): Versións máis seguras que producen valores hash máis longos (256 bits ou 512 bits). SHA-256 é amplamente utilizado en criptografía, por exemplo, en blockchain.
   - **SHA-3**: Unha versión mellorada e máis moderna da familia SHA, que ofrece maior seguridade e flexibilidade.

2. **Funcións hash non criptográficas**: Estas funcións están deseñadas para ser rápidas e eficientes, pero non para aplicacións que requiren seguridade, xa que non teñen as mesmas propiedades criptográficas. Úsanse en estruturas de datos como táboas hash, algoritmos de busca e indexación. Exemplos:

   - **MurmurHash**: Función hash rápida deseñada para uso xeral, con boas propiedades de difusión e eficiencia.
   - **CRC32 (Cyclic Redundancy Check):** Un hash utilizado para verificar a integridade de datos en transmisións, pero non criptográficamente seguro.
   - **FNV (Fowler-Noll-Vo)**: Unha función hash sinxela e rápida deseñada para táboas hash.

3. **Funcións hash para contrasinais**: Estas funcións están deseñadas especificamente para almacenar contrasinais de maneira segura. O obxectivo principal é protexer contrasinais en caso de que se comprometan as bases de datos, polo que inclúen técnicas para dificultar ataques de forza bruta

   - **bcrypt**: Unha función hash que inclúe un factor de traballo para aumentar a dificultade de cálculo do hash, facéndoo resistente aos ataques de forza bruta.
   - **scrypt**: Deseñada para ser difícil de acelerar mediante hardware especializado, e polo tanto, máis segura contra ataques masivos.
   - **Argon2**: Unha das funcións hash máis modernas e seguras para contrasinais, gañadora do concurso de contrasinais de 2015.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 4 ⇓
 </font>
</center>

----------------------------------

## **<font color="yellow">1.3</font> Dispoñibildade**
A dispoñibilidade refírese á garantía de que un usuario poderá acceder á información sempre que a precise.

Para garantir a dispoñibilidade da información recórrese habitualmente á redundancia:

- Redundancia nos sistemas de alimentación eléctrica e uso de SAI/UPS.
- Redundancia no acceso á rede: bonding de tarxetas de rede (LACP), rutas duplicadas.
- Redundancia na información almacenada: Uso de RAID.
- Redundancia na capacidade de procesamento: Uso de Clustering e balanceo de carga.

A dispoñibilidade informática é un principio clave da seguridade da información que garante que os sistemas, servizos e datos estean accesibles e operativos para os usuarios autorizados cando o necesiten. Noutras palabras, a dispoñibilidade asegura que os recursos informáticos estean dispoñibles de forma continua, sen interrupcións indebidas.

## **Principios da dispoñibilidade informática**:
- **Accesibilidade**: Os usuarios autorizados deben poder acceder á información e aos recursos en calquera momento que o necesiten.
- **Continuidade do servizo**: Os servizos deben permanecer operativos, mesmo en condicións adversas, como fallos de hardware, ataques ou desastres.
- **Redución dos tempos de inactividade**: Minimizar o tempo que os sistemas están fóra de servizo, sexa por mantemento ou por incidentes inesperados.

## **Medidas para garantir a dispoñibilidade informática**:
A dispoñibilidade require medidas técnicas, organizativas e físicas para previr fallos e reducir os tempos de inactividade. As máis comúns son:

1. **Redundancia**
A redundancia implica ter compoñentes duplicados ou alternativos que poidan asumir as funcións en caso de fallo.

   - **Redundancia de hardware**: Utilizar hardware redundante, como servidores, discos duros e fontes de alimentación. Se un compoñente falla, outro idéntico toma o control automaticamente.
   Exemplo: Un servidor de base de datos que usa discos en RAID asegura que os datos sigan sendo accesibles aínda que un dos discos falle.
   - **Redundancia de rede**: Ter conexións de rede redundantes para manter a conectividade mesmo se un enlace ou dispositivo de rede falla.
   Exemplo: Unha empresa ten dous provedores de Internet; se un presenta problemas, o outro toma o control sen interromper o servizo.

2. **Balanceo de carga**
Distribúe as solicitudes entrantes entre varios servidores para evitar a sobrecarga dun só servidor, mellorar o rendemento e asegurar que, se un servidor falla, os outros poidan asumir o tráfico.

  - Exemplo: Un sitio de comercio electrónico con moito tráfico usa balanceo de carga para distribuír as solicitudes entre varios servidores web. Se un falla, as solicitudes rediríxense automaticamente a outros.

3. **Sistemas de respaldo e recuperación**

Realizar copias de seguridade periódicas dos datos críticos e contar cun plan de recuperación ante desastres.

   - Exemplo: Unha empresa fai copias de seguridade diarias da súa base de datos en nubes seguras. Se o servidor falla, os datos restáuranse desde a nube.

4. **Mantenimiento preventivo**
Actualizar regularmente o software e os compoñentes de hardware para previr fallos antes de que ocorran.

  - Exemplo: Cambiar os discos duros dun servidor antes de fallen para evitar perdas de datos prestando atención a información SMART e aos fallos dos RAID

5. **Sistemas de monitoreo**
Monitorización continua dos sistemas para detectar problemas de rendemento ou fallos inminentes.

   - Exemplo: Un sistema de monitoreo alerta ao equipo de TI cando un dos routers presenta latencia elevada, permitindo actuar antes de que afecte os usuarios.
  
6. **Clústeres de alta dispoñibilidade**
Un conxunto de servidores que traballan xuntos para manter operativos os servizos, aínda que un ou máis fallen.

  - Exemplo: Un sistema de bases de datos críticas usa un clúster de alta dispoñibilidade; se o servidor principal falla, outro asume o control automaticamente.

7. **Protección contra ataques DDoS**
Implementar medidas para mitigar ataques de denegación de servizo distribuído (DDoS).

  - Exemplo: Un provedor de servizos en nube ofrece protección DDoS, filtrando solicitudes maliciosas antes de que cheguen aos servidores.

8. **Centros de datos distribuídos (georeplicación)**
Ter copias dos servizos en varias localizacións xeográficas para que, se unha ubicación falla, os servizos sigan funcionando desde outra.

  - Exemplo: Unha plataforma de streaming como Netflix usa georeplicación para asegurar a dispoñibilidade mundial do servizo.

9. **Políticas de escalabilidade**
A capacidade dun sistema para escalar automaticamente en función da demanda.

   - Exemplo: Durante o Black Friday, as tendas en liña escalan automaticamente os servidores para manexar o aumento de tráfico.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 5 ⇓
 </font>
</center>

----------------------------------

## **<font color="yellow">1.4</font> Non Repudio**
O repudio refírese á negación dunha acción ou dun evento por parte dun participante nun proceso. No contexto da seguridade informática, o repudio ten que ver coa posibilidade de que un usuario ou entidade negue ter realizado algunha acción, como o envío dun mensaxe, a recepción de información ou a participación nunha transacción.

## **Tipos de Repudio**

**Repudio da orixe (ou do remitente)**:
Ocorre cando unha entidade nega ter enviado unha mensaxe ou iniciado unha acción. Por exemplo, un usuario podería negar ter enviado un correo electrónico ou realizado unha transacción financeira.

**Repudio do receptor (ou do destinatario)**:
Ocorre cando unha entidade nega ter recibido unha mensaxe ou certa información. Neste caso, un usuario podería afirmar que nunca recibiu un correo ou un documento importante.

## **Garantindo o Non Repudio**
Para evitar o repudio e asegurar que unha entidade non poida negar ter realizado ou recibido unha acción, utilízanse varias técnicas criptográficas e legais. Aquí están os métodos máis comúns:

1. **Sinaturas dixitais**:  
As sinaturas dixitais garanten que unha mensaxe foi enviada por un remitente específico e que non foi alterada. Funcionan mediante o uso de criptografía de chave pública.  
Cando unha persoa envía unha mensaxe, asina o contido usando a súa chave privada. O destinatario pode verificar esta sinatura coa chave pública do remitente.
Isto garante que a mensaxe provén do remitente e non pode ser repudiada.

     - Exemplo: Unha persoa asina un contrato dixitalmente; a sinatura asegura que non poderá negar a súa participación na creación ou aceptación do documento.

1. **Marcas de tempo (timestamps)**:  
Unha marca de tempo utilízase para rexistrar o momento exacto no que ocorreu unha transacción ou se enviou unha mensaxe. Estas marcas adoitan estar asinadas por unha autoridade de certificación confiable.  
As marcas de tempo garanten que unha transacción ou mensaxe se enviou ou recibiu nun momento específico e evitan que un remitente ou receptor negue a temporalidade dun evento.

     - Exemplo: Un servizo de transaccións financeiras inclúe unha marca de tempo asinada para garantir que unha transacción se realizou a unha hora e data específicas.

3. **Selos dixitais**:  
Un selo dixital é unha técnica usada para garantir a autenticidade dun documento e para asegurar que non foi alterado dende a súa creación ou aprobación.
Ao selar dixitalmente un documento, pódese garantir tanto a autenticidade do emisor como a integridade do contido, evitando así que o emisor negue ter enviado o documento ou modificado o seu contido.

     - Exemplo: Un servizo de correo electrónico que aplica un selo dixital aos correos enviados para garantir que non foron alterados e que realmente foron enviados polo emisor lexítimo.

4. **Autoridades de Certificación (CAs)**:  
As autoridades de certificación emiten certificados dixitais que validan a identidade das partes nunha comunicación.
Nun sistema de chave pública, unha CA garante que unha chave pública pertence a unha persoa ou entidade específica. Se alguén tenta negar ter asinado unha mensaxe, a CA pode proporcionar evidencia en forma dun certificado dixital.

    - Exemplo: Cando se asina un contrato en liña, a CA valida que o asinante é efectivamente quen di ser, o que evita que este poida negar a súa participación.

5. **Rexistros de auditoría (logs)**:  
Os rexistros de auditoría son unha ferramenta útil para proporcionar probas en caso de repudio. Estes rexistros documentan cada paso ou transacción realizada nun sistema, o que permite rastrexar a actividade do usuario.
Estes rexistros poden estar protexidos contra manipulacións mediante selos dixitais e poden servir como probas en caso de disputa.

    - Exemplo: Un sistema de banca en liña garda un rexistro de todas as transaccións realizadas, con marcas de tempo e direccións IP, para evitar que un usuario negue ter realizado unha transferencia.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 6 ⇓
 </font>
</center>

----------------------------------

# **Seguridade Física e Seguridade Lóxica**

## **<font color="yellow">2.1</font> Seguridade Física**
A seguridade física é fundamental para garantir a protección dos activos tecnolóxicos e humanos contra ameazas como desastres naturais, roubo, vandalismo e ataques. Nos entornos tecnolóxicos actuais, como os **Centros de Procesamento de Datos (CPD)**, a seguridade física é especialmente crucial para preservar a continuidade das operacións e a integridade dos datos. Ademais, os **Sistemas de Alimentación Ininterrompida (UPS/SAI)** xogan un papel clave para evitar fallos de subministración eléctrica que poderían provocar interrupcións graves.

A **seguridade física** refírese ás accións tomadas para protexer as instalacións e os recursos materiais contra danos ou accesos non autorizados. Inclúe tanto medidas preventivas como dispositivos de protección que buscan minimizar os riscos asociados á infraestrutura física onde se almacenan e procesan datos importantes.

**Principais Medidas de Seguridade Física**:

1. **Control de acceso**: Emprego de tarxetas de acceso, controis biométricos (pegadas dixitais, recoñecemento facial) ou códigos para limitar a entrada a áreas restrinxidas.

2. **Vixilancia**: Cámaras de seguridade, alarmas e sensores de movemento que permiten monitorizar continuamente as instalacións, especialmente en zonas críticas como os CPD.

3. **Barreiras físicas**: Portas reforzadas, ventás con protección antiintrusión, cercados ou muros que restrinxen o acceso non autorizado ás instalacións.

4. **Controis ambientais**: Inclúen sistemas de detección e extinción de incendios, sistemas de climatización para regular a temperatura, e sistemas contra inundacións que protexen os equipos contra fenómenos ambientais adversos.

Os **Centros de Procesamento de Datos (CPD)** son instalacións que albergan equipos críticos, como servidores e sistemas de almacenamento de datos, que permiten o procesamento e o almacenamento de información a gran escala. Estas instalacións son o corazón de moitas operacións tecnolóxicas, xa que soportan desde o funcionamento de sitios web ata aplicacións empresariais e bases de datos. O uso de CPD permite:

1. **Garantir a dispoñibilidade dos datos**: Un CPD debe manter os sistemas en funcionamento de forma continua, evitando interrupcións que poidan afectar aos servizos dependentes.

2. **Protección de datos críticos**: Os CPD almacenan grandes volumes de datos sensibles que deben estar protexidos tanto contra ataques físicos como contra desastres naturais ou fallos de enerxía.

3. **Redundancia e recuperación**: Moitos CPD implementan sistemas redundantes que garanten a continuidade operativa en caso de fallo dalgún compoñente. Ademais, están preparados para permitir a recuperación rápida dos datos en caso de desastre.

4. **Xestión de grandes volumes de tráfico e datos**: Os CPD están deseñados para xestionar volumes masivos de datos de maneira eficiente e segura, cunha infraestrutura que soporta o rendemento necesario.

## **Redundancia na alimentación eléctrica (SAI/UPS)**
Os sistemas **UPS/SAI (Sistema de Alimentación Ininterrompida)** son un compoñente vital nos CPD e outras instalacións críticas, xa que proporcionan enerxía temporal durante cortes ou fluctuacións de corrente, garantindo que os sistemas non sufran danos nin perdas de datos.

Un **UPS/SAI** é un dispositivo que actúa como unha fonte de enerxía de emerxencia. Almacena enerxía en baterías e actívase cando se produce un corte de subministración eléctrica, mantendo operativos os equipos conectados ata que se restaure a enerxía ou ata que se poida realizar un apagado controlado dos sistemas.

## **Compoñentes dun UPS/SAI**

- Batería: Almacena enerxía para alimentar os dispositivos en caso de fallo de subministración.
- Rectificador: Converte a corrente alterna (CA) en corrente continua (CC) para cargar as baterías.
- Inversor: Converte a corrente continua (CC) das baterías de novo en corrente alterna (CA) para ser utilizada polos dispositivos conectados.
- Bypass: Permite que a corrente pase directamente aos dispositivos no caso de que o sistema UPS teña un problema.

## **Tipos de UPS/SAI**

1. UPS Standby (Off-line): Proporciona enerxía de emerxencia só cando detecta un fallo de subministración eléctrica. Útil para equipos menos críticos.

2. UPS Line-Interactive: Pode axustar as variacións de tensión sen utilizar a batería, proporcionando unha protección extra contra flutuacións.

3. UPS On-line (Dobre Conversión): O máis avanzado, sempre filtra e estabiliza a corrente antes de entregala aos equipos. Ideal para CPD e instalacións críticas.

## **Vantaxes dun UPS/SAI**
- Evita a perda de datos: O UPS garante que, en caso de corte, haxa tempo suficiente para salvar datos e realizar un apagado controlado.
- Prevención de danos: Protexe os equipos contra sobrevoltaxes ou variacións que poderían danalos.
- Minimiza o tempo de inactividade: Os sistemas críticos seguen funcionando ata que se restaure a enerxía ou se utilicen outras fontes de enerxía de emerxencia (como xeradores).

## **Selección dun UPS/SAI para un CPD**
Ao seleccionar un UPS/SAI para un CPD, hai varios factores clave que considerar:

- **Capacidade**: O valor nominal de volt-amperios (VA) debe ser superior á carga que soportarán os equipos conectados.
- **Tempo de autonomía**: O tempo que o UPS pode alimentar os equipos despois dun corte debe ser suficiente para asegurar o funcionamento ata que se active o xerador ou se realice un apagado seguro.
- **Compatibilidade**: Debe ser compatible cos equipos e ofrecer funcionalidades avanzadas, como a monitorización remota.

Os sistemas UPS/SAI forman parte dunha estratexia global de seguridade física nun CPD. Algúns outros compoñentes vitais inclúen:

- **Xeradores de respaldo**: Para cortes prolongados, un UPS pode proporcionar enerxía temporal, pero un xerador de respaldo garante o funcionamento continuo a longo prazo.
- **Sistemas de climatización**: Os servidores e equipos de alto rendemento producen unha gran cantidade de calor. Un sistema de climatización eficiente evita o sobrequecemento e os danos aos equipos.
- **Sistemas de extinción de incendios**: O uso de sistemas automáticos de detección e extinción de incendios evita a destrución de equipos e perda de datos.
- **Protección contra inundacións**: A localización e deseño do CPD deben minimizar o risco de inundacións, especialmente en áreas con alto risco de desastres naturais.
 
A seguridade física é especialmente importante en ambientes críticos como os **Centros de Procesamento de Datos**, xa que calquera interrupción, acceso non autorizado ou dano pode provocar fallos masivos nos sistemas que dependen destes datos. Ademais de protexer os equipos e datos, a seguridade física tamén garante a continuidade operativa das organizacións que dependen destes servizos.

## **<font color="yellow">2.2</font> Seguridade Lóxica**
A **seguridade lóxica** refírese ao conxunto de medidas, ferramentas e procedementos empregados para protexer os sistemas de información e os seus activos dixitais fronte a accesos non autorizados, modificacións, roubos ou ataques que comprometan a súa integridade, confidencialidade e dispoñibilidade. Mentres a seguridade física se ocupa da protección dos compoñentes físicos (servidores, dispositivos de rede, centros de datos), a seguridade lóxica enfócase na protección dos recursos dixitais a través de medidas de control e protección a nivel de software e datos.

## **Compoñentes da Seguridade Lóxica**
### 2.2.1 **Control de acceso**:

- O control de acceso refírese á capacidade de restrinxir quen pode ver, modificar ou interactuar con sistemas e datos específicos. Isto inclúe tanto o acceso físico (aos dispositivos) como o acceso a nivel de software.
- Existen diferentes tipos de control de acceso:

  - **Autenticación**: Verificación da identidade dun usuario ou sistema. Isto inclúe contrasinais, tarxetas intelixentes, tokens de hardware, ou métodos biométricos (impresións dixitais, recoñecemento facial).
  - **Autorización**: Definición dos permisos que se outorgan a usuarios ou sistemas unha vez autenticados. Pódese implementar a través de mecanismos como listas de control de acceso (ACLs), políticas baseadas en roles (RBAC), ou políticas baseadas en atributos (ABAC).
  - **Auditoría e rexistro de eventos**: Os sistemas rexistran eventos importantes, como accesos ou modificacións de datos, para analizar posibles problemas de seguridade, identificar comportamentos sospeitosos ou investigar incidentes.

### 2.2.2 **Cifrado de datos**:

  - O cifrado é unha técnica clave da seguridade lóxica que garante que os datos sexan ilegibles para calquera que non teña as credenciais correctas para descifralos. Este proceso pódese aplicar tanto aos datos almacenados como aos datos en tránsito.
    - **Cifrado de datos en tránsito**: Protexe os datos que se están transmitindo entre dispositivos a través de redes. Protocolos como TLS (Transport Layer Security) e VPNs (Virtual Private Networks) son comúns neste ámbito.
    - **Cifrado de datos en repouso**: Protexe os datos almacenados en discos duros, bases de datos ou sistemas de almacenamento en nube. Un exemplo sería o uso de cifrado AES (Advanced Encryption Standard) en bases de datos.

### 2.2.3 **Autenticación multifactor (MFA)**:

  - A MFA é unha medida de seguridade lóxica que require que o usuario proporcione varias formas de identificación para acceder a un sistema ou servizo. Adoita combinar algo que o usuario sabe (como un contrasinal), algo que ten (como un token ou código xerado por unha aplicación), e algo que é (como unha característica biométrica).
  - O MFA engade unha capa adicional de seguridade fronte ao roubo de credenciais, xa que o atacante necesitaría acceder a múltiples factores para comprometer o sistema.

### 2.2.4 **Firewall e sistemas de control de tráfico**:

  - Un **firewall** é un mecanismo que controla o tráfico de rede entrante e saínte, baseándose nun conxunto de regras de seguridade predeterminadas. Estes sistemas poden ser hardware, software ou unha combinación de ambos.
    - **Firewall de rede**: Controla o acceso a nivel de rede, protexendo contra ataques externos.
    - **Firewall de aplicación**: Específico para a protección de aplicacións web ou outras aplicacións de usuario, filtrando solicitudes maliciosas como SQL injection ou cross-site scripting.
    - **WAF (Web Application Firewall)**: Firewall especializado que protexe aplicacións web contra ataques como SQL injection ou cross-site scripting (XSS).

### 2.2.5 **Sistemas de detección e prevención de intrusións (IDS/IPS)**:

  - Os **IDS (Intrusion Detection Systems)** son sistemas que monitorizan o tráfico de rede ou actividades de sistemas para detectar comportamentos anómalos ou ataques coñecidos, xerando alertas cando se detectan.
  - Os **IPS (Intrusion Prevention Systems)** van un paso máis aló, xa que non só detectan intrusións senón que tamén actúan para bloquealas en tempo real.

### 2.2.6 **Sistemas de xestión de seguridade da información (SIEM)**:

  - Un **SIEM (Security Information and Event Management)** é unha ferramenta que agrega, analiza e correlaciona os eventos de seguridade rexistrados por varios sistemas da rede, como firewalls, IDS/IPS e servidores. Permite a análise en tempo real e a detección de ameazas, proporcionando unha visión xeral do estado da seguridade na organización.

### 2.2.7 **Actualizacións e parches de software**:

  - Unha parte crítica da seguridade lóxica consiste en manter os sistemas actualizados. As vulnerabilidades son descubertas de maneira continua, e os desenvolvedores lanzan parches para corrixilas. Non aplicar estes parches deixa os sistemas vulnerables a exploits coñecidos.

### 2.2.8 **Xestión de identidades e accesos (IAM)**:

  - O **IAM (Identity and Access Management)** refírese a políticas, procedementos e ferramentas utilizadas para xestionar as identidades dixitais dos usuarios e garantir que só teñan acceso aos recursos que precisan.
    - Funcións clave inclúen a creación de contas de usuario, asignación de roles, autenticación e control de acceso en función do nivel de privilexio.

### 2.2.9 **Prevención contra malware**:

  - O malware é unha das ameazas máis comúns á seguridade lóxica. As solucións anti-malware monitorizan os sistemas en busca de software malicioso, como virus, troianos ou ransomware. Estas ferramentas están deseñadas para detectar, bloquear e eliminar malware, protexendo os sistemas contra comprometementos.

### 2.2.10 **Respaldo e recuperación de datos**:

  - A seguridade lóxica tamén abarca a protección dos datos mediante copias de seguridade periódicas, que garanten a continuidade do negocio en caso de ataque ou fallo. Ademais, os plans de recuperación ante desastres (DRP) son esenciais para asegurar que os sistemas poidan recuperarse rápidamente tras un ataque ou incidente de seguridade.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 7 ⇓
 </font>
</center>

----------------------------------

# **Ameazas, Ataques e Vulnerabilidades**

---------------------------------------------
## **<font color="yellow">3.1</font> Ameaza**
Unha **ameaza** é calquera posible evento, entidade ou circunstancia que poida explotar unha vulnerabilidade nun sistema ou activo de información, causando dano ou comprometendo a súa seguridade. As ameazas poden ser naturais, humanas ou tecnolóxicas. Algunhas son intencionadas (como un ataque informático) e outras poden ser accidentais ou de carácter natural.

### **3.1.1 Definición de Ameaza**
Unha **ameaza** é calquera evento, acción ou entidade que poida explotar unha vulnerabilidade e provocar danos nun sistema. As ameazas poden ser:

- **Naturais**: Como desastres naturais que causan fallos en infraestruturas críticas.

- **Humanas**: Como ataques maliciosos (hackers, organizacións criminais) ou erros cometidos por usuarios e administradores.

- **Accidentais**: Fallos técnicos ou humanos sen intención maliciosa que resultan en perda de datos ou interrupcións de servizo.

### **3.1.2 Tipos de ameazas**
- **Naturais**: Desastres naturais como inundacións, terremotos, incendios, etc., que poden danar os sistemas informáticos.
- **Humanas**: Poden ser intencionadas (como ciberataques) ou accidentais (como un erro dun usuario que comprometa a seguridade).
- **Tecnolóxicas**: Fallos de hardware ou software, obsolescencia tecnolóxica, entre outros.

--------------------------------------------
## **<font color="yellow">3.2</font>Ataque**
Un **ataque** é unha acción deliberada e malintencionada executada por un axente (persoa, grupo ou programa) para explotar unha vulnerabilidade nun sistema, co obxectivo de danar, roubar, modificar ou destruír datos, ou comprometer a confidencialidade, integridade ou dispoñibilidade da información.

### **3.2.1 Definición e Taxonomía de Ataques**
Os ataques son accións levadas a cabo por ameazas para explotar vulnerabilidades.

### **3.2.2 Tipos de ataques**
- **Ataques activos**: O atacante realiza cambios directos no sistema, como a modificación de datos ou a interrupción de servizos. Exemplo: Un ataque de denegación de servizo (DoS) que sobrecarga un servidor para deixalo inoperativo.
- **Ataques pasivos**: O atacante intercepta datos sen alterar o sistema. Exemplo: Espiar o tráfico de rede para obter información confidencial.

### **3.2.3 Fases dun Ataque**
Os ataques adoitan seguir unha serie de fases:

1. **Recoñecemento**: Recopilación de información sobre o obxectivo (ex: footprinting, scanning).

2. **Escaneo**: Exploración activa de portas abertas, servizos en execución e vulnerabilidades que poidan ser explotadas.

3. **Gañar acceso**: Explotar a vulnerabilidade para obter acceso a recursos ou información.

4. **Mantemento do acceso**: Usar backdoors ou outros mecanismos para manter o control do sistema.

5. **Cubrir os rastros**: Eliminar rexistros e outros trazos para evitar a detección.

### **3.2.4 Taxonomía de Ataques**:
- **Ataques pasivos**: Observación ou espionaxe de comunicacións sen alteración dos datos (ex: sniffing, eavesdropping).

- **Ataques activos**: Modificación ou interrupción de datos e servizos (ex: man-in-the-middle, SQL injection).

- **Ataques de negación de servizo (DoS)**: Intento de sobrecargar un sistema para facelo inaccesible aos usuarios lexítimos.

- **Ataques internos**: Cando o atacante é un empregado ou usuario con acceso autorizado que utiliza ese acceso para comprometer o sistema.

-----------------------------------------------------
## **<font color="yellow">3.3</font>Vulnerabilidade**
Unha vulnerabilidade é unha debilidade ou falla nun sistema, no deseño, implementación ou configuración de software ou hardware que pode ser explotada por unha ameaza para causar dano ou comprometer a seguridade dos activos de información. As vulnerabilidades deben identificarse e corrixirse antes de que poidan ser explotadas por un atacante.

### **3.3.1 Taxonomía de Vulnerabilidades**
As vulnerabilidades clasifícanse en función de factores como:

- **Software**: Erros no código ou na lóxica de aplicacións, sistemas operativos e servizos que permiten a explotación por parte de atacantes. Exemplos: buffer overflow, fallos de autenticación, SQL injection, XSS.

- **Hardware**: Fallos no deseño ou na fabricación de compoñentes físicos que poidan ser explotados, como as vulnerabilidades en procesadores (Meltdown, Spectre).

- **Redes**: Configuracións incorrectas en dispositivos de rede, protocolos de comunicación inseguros ou falta de cifrado, que permiten escoitar comunicacións ou realizar ataques de Man-in-the-Middle (MitM).

- **Humanas**: Erros cometidos por usuarios ou administradores, como a configuración inadecuada de sistemas ou a divulgación de credenciais sensibles.

- **De Configuración**: Configuracións incorrectas dun sistema que deixan portas abertas para os atacantes, como contrasinais por defecto sen cambiar ou portas non seguras abertas.

- **Fsicas**: Aquelas que permiten o acceso físico non autorizado a sistemas ou dispositivos.

### **3.3.2 Clasificación das Vulnerabilidades**
As vulnerabilidades pódense clasificar por:

#### **Gravidade**:

- **Críticas**: Fallas que permiten a execución remota de código ou acceso completo sen autorización. Exemplo: execución remota en servizos sen parches.
- **Altas**: Vulnerabilidades que poden ser explotadas con certas condicións pero que levan a un acceso significativo ou interrupcións.
- **Medias/Baixas**: Poden non levar directamente a un impacto severo, pero aínda así expoñen o sistema a riscos menores ou actúan como puntos de entrada para ataques máis complexos.

#### **Categoría técnica**:

- **Erro de autorización**: Falta de control sobre os permisos dos usuarios.
- **Erros de configuración**: Configuracións incorrectas que expoñen recursos de maneira innecesaria (ex: bases de datos abertas a Internet sen control de acceso).
- **Erro de autenticación**: Fallos nos mecanismos de autenticación que permiten acceso non autorizado.

#### **Por orixe:**
- **Erro humano**: Falta de actualización, erro na configuración de seguridade.
- **Erros de deseño ou implementación**: Fallos no código ou arquitecturas inseguras.

#### **Por tipo de sistema**:
- **Sistemas operativos**: Vulnerabilidades nos sistemas que controlan o hardware.
- **Aplicacións web**: Como SQL injection ou Cross-Site Scripting (XSS).
- **Infraestrutura de rede**: Configuracións de router inseguras ou protocolos mal implementados.

### **3.3.3 Os Exploits ou Probas de Concepto**
- **Exploit**: Un **exploit** é unha ferramenta ou software que aproveita unha vulnerabilidade. Os exploits poden ser utilizados para probar sistemas de forma lexítima, ou con intención maliciosa para realizar un ataque.
  - **Exploits zero-day**: Son os que explotan vulnerabilidades descoñecidas polo público ou o fabricante, sendo especialmente perigosos.
- **Proba de Concepto (PoC)**: Un PoC é unha demostración que mostra como pode ser explotada unha vulnerabilidade. Moitas veces úsase para fins de investigación, para alertar aos desenvolvedores sen danar sistemas reais.

### **3.3.4 Divulgación das Vulnerabilidades**
A **divulgación de vulnerabilidades** é o proceso de comunicar a existencia dunha falla de seguridade. Pode ser:

- **Divulgación responsable**: O investigador informa aos fabricantes ou desenvolvedores, permitindo que teñan tempo para resolver o problema antes de facelo público.

- **Divulgación pública**: A vulnerabilidade faise pública inmediatamente, sen dar tempo ao fabricante de corrixir o problema, o que pode poñer en perigo aos usuarios.

- **Divulgación coordinada**: Cando as vulnerabilidades se comunican a múltiples partes interesadas para garantir unha solución oportuna.

- **Non divulgación**: A vulnerabilidade se mantén en segredo, sen comunicar a ningunha parte constituindo unha Zero Day.

### **3.3.5 Bases de Datos de Vulnerabilidades**
As bases de datos de vulnerabilidades son recursos que catalogan e fan un seguimento das vulnerabilidades coñecidas. Exemplos principais:

- **CVE (Common Vulnerabilities and Exposures)**: Unha base de datos que asigna un identificador único a cada vulnerabilidade coñecida.

- **NVD (National Vulnerability Database)**: Unha extensión de CVE, que proporciona información detallada sobre as vulnerabilidades e clasifica a súa severidade mediante métricas como o **CVSS (Common Vulnerability Scoring System)**.


## **<font color="yellow">3.4</font> Risco e Impacto**
### **3.4.1 Risco**
O **risco** na seguridade informática refírese á probabilidade de que unha ameaza explote unha vulnerabilidade, e ás consecuencias dese evento sobre os activos ou sistemas afectados. A xestión de riscos é unha parte esencial na seguridade, que inclúe avaliar as vulnerabilidades, valorar o impacto potencial e implementar medidas para reducir ou eliminar o risco.

### **3.4.2 Impacto**
O **impacto** refírese ao efecto que a explotación dunha vulnerabilidade pode ter nun sistema ou organización. O impacto inclúe:

- **Perda de datos sensibles**: Datos persoais, financeiros ou comerciais comprometidos.
- **Interrupción dos servizos**: Caída de sistemas ou aplicacións críticas, afectando a operación.
- **Perda financeira**: Custos asociados á reparación de danos ou recuperación de datos.
- **Danos reputacionais**: Perda de confianza dos clientes e socios comerciais debido a incidentes de seguridade.

----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 8 ⇓
 </font>
</center>

----------------------------------
> - Concepto de Seguridade Activa
>   - Tecnoloxías: Firewalls, IDS/IDPS, SIEM, Antimalware, Actualizacións, Autenticación
> - Concepto de Seguridade Pasiva
>   - Tecnoloxías: Cifrado, Backups, Controis de acceso físico, Segmentación da rede, Políticas de >Contrasinais, "hardening" de sistemas (bastión)

## 1. Seguridade Activa e Pasiva
A seguridade activa e a seguridade pasiva son dous enfoques complementarios para protexer os sistemas de información e redes informáticas dunha organización. Aínda que ambos buscan reducir riscos e protexer os activos, diferéncianse no seu modo de actuar fronte ás ameazas e nas ferramentas que empregan.

### Seguridade Activa
A seguridade activa refírese ás medidas e accións que se toman de forma proactiva para previr, detectar e responder ás ameazas de seguridade en tempo real. Este tipo de seguridade está orientada a actuar de forma inmediata cando ocorre un incidente ou para mitigar un ataque antes de que cause un dano significativo.

### Principais características da seguridade activa:

- **Monitorización constante**: Sistemas que están en vixilancia continua para detectar actividades anómalas ou sospeitosas.
-** Resposta inmediata**: Implica accións correctivas ou defensivas inmediatas ante un ataque ou intento de intrusión.
-** Detección temperá**: Empregan tecnoloxías para identificar ameazas antes de que estas causen danos.

### Medidas de seguridade activa:

1. **Firewalls**: Dispositivos ou software que controlan o tráfico de rede entrante e saínte segundo regras de seguridade predefinidas, bloqueando o acceso non autorizado.
2. **Sistemas de detección e prevención de intrusións (IDS/IPS)**:
   - **IDS (Intrusion Detection System)**: Detecta actividades maliciosas ou anomalías na rede ou no sistema, alertando os administradores.
   - **IPS (Intrusion Prevention System)**: Vai un paso máis alá ao bloquear ou mitigar automaticamente os ataques en tempo real.
3. Antivirus e antimalware: Programas que analizan arquivos e o tráfico de rede na procura de malware, virus ou outras ameazas, elíminandoos ou illándoos inmediatamente.
4. Sistemas de monitorización de rede: Ferramentas que supervisan a actividade da rede para identificar comportamentos inusuais, como intentos de escaneo de portos, accesos non autorizados ou tráfico anómalo.
5. Parcheo e actualizacións: Instalación constante de actualizacións de software e parches de seguridade para evitar vulnerabilidades coñecidas que poidan ser explotadas.
6. Autenticación multifactor (MFA): Require múltiples formas de verificación (como contrasinais, tokens ou biometría) para garantir que só usuarios autorizados accedan aos sistemas.
  
### Seguridade Pasiva
A seguridade pasiva refírese ás medidas que se implementan para minimizar o impacto dun incidente de seguridade unha vez que este ocorreu ou para resistir os efectos dun ataque. Este tipo de seguridade non tenta previr o ataque en tempo real, senón que se centra na protección, redución de danos e recuperación.

### Principais características da seguridade pasiva:

- **Protección preventiva**: Evita que un ataque cause danos graves, pero non responde directamente aos incidentes en tempo real.
- **Resiliencia**: Aumenta a capacidade dos sistemas para soportar e recuperarse dun incidente.
- **Mitigación do impacto**: Enfócase en reducir as consecuencias negativas dun ataque ou fallo.

### Medidas de seguridade pasiva:

1. **Cifrado de datos**: Protexe os datos en tránsito e en repouso mediante técnicas de cifrado, de modo que, aínda que sexan interceptados ou roubados, non poidan ser lidos sen as chaves de desencriptación.
2. **Backups (copias de seguridade)**: Realización de copias periódicas de datos críticos, almacenadas en localizacións seguras, que permiten restaurar a información en caso de perda ou ataque (como un ransomware).
3. **Controis de acceso físicos**: Medidas como pechaduras, cámaras de seguridade, e acceso restrinxido ás instalacións onde se aloxan servidores e equipos críticos para evitar o acceso non autorizado.
4. **Segmentación de rede**: Dividir a rede en subredes ou zonas separadas para que un posible ataque só afecte unha parte do sistema, limitando a súa propagación.
5. **Políticas de contrasinais robustas**: Definir políticas que requiran o uso de contrasinais seguras e actualizalas regularmente para previr accesos non autorizados.
6. **Hardening de sistemas**: Redución da superficie de ataque desactivando servizos innecesarios, pechando portos non usados e eliminando software non esencial para minimizar posibles puntos de entrada.

### Diferenzas clave entre seguridade activa e pasiva:

| **Aspecto**               | **Seguridade Activa**                                            | **Seguridade Pasiva**                                                |
| ------------------------- | ---------------------------------------------------------------- | -------------------------------------------------------------------- |
| **Obxectivo principal**   | Detectar, previr e responder a ataques en tempo real.            | Minimizar o dano e aumentar a capacidade de recuperación.            |
| **Enfoque**               | Proactivo (actúa antes ou durante o ataque).                     | Reactivo (protección fronte a ataques ou mitigación tras un ataque). |
| **Resposta ante ameazas** | Actúa inmediatamente para bloquear, eliminar ou mitigar ameazas. | Protexe os datos e sistemas para reducir o impacto dun ataque.       |
| **Exemplos de medidas**   | Firewalls, IPS/IDS, antivirus, monitorización de rede.           | Cifrado, backups, segmentación de rede, hardening de sistemas.       |
		
----------------------------------
<center style="background-color:#FFF;">
 <font color="black" >
  ⇓ pagina 9 ⇓
 </font>
</center>

----------------------------------
> - Definicións:
>   - Informe Pericial
>   - Evidencia Dixital
>   - Análise Forense
> - Metodoloxía e Boas Prácticas
>   - Plan de Adquisición
>   - Cadea de Custodia
>   - Documentación
> - Requisitos da evidencia dixital
> - Normativa

## 1. Conceptos Básicos
O obxectivo principal do análise forense é a preservación e análise das evidencias dixitais de forma que estas sexan admisibles en procedementos legais, asegurando a súa integridade e autenticidade. Busca tamén identificar as causas dun incidente e os responsables.

- **Análise Forense**: É o proceso de investigación mediante técnicas científicas e analíticas especializadas que permiten identificar, preservar, extraer, analizar e documentar datos válidos (evidencias dixitais) que expliquen determinados sucesos que poderán ser utilizadas en procedementos legais. Inclúe a análise de sistemas informáticos, dispositivos de almacenamento e redes, co obxectivo de reconstruír accións, identificar infraccións ou delitos dixitais.

- **Informe Pericial**: Documento elaborado por un perito en informática forense que detalla o proceso de investigación, describe as evidencias atopadas e presenta as súas conclusións. Este informe é clave no contexto xudicial, xa que serve como proba pericial nun xuízo.

- **Informática Forense**: Rama da informática dedicada á investigación de incidentes relacionados coa ciberseguridade, como ataques, roubos de datos, fraudes ou accesos non autorizados. Inclúe a adquisición, análise e preservación de evidencias para usarse en procedementos legais.

- **Evidencia Dixital**: Calquera información ou dato almacenado ou transmitido electrónicamente que poida ser utilizado como proba nunha investigación. A evidencia dixital pode incluír correos electrónicos, rexistros de sistema, arquivos de audio ou vídeo, etc.
  
## 2. Metodoloxía e Boas Prácticas
- **Plan de Adquisición**: Antes de comezar a investigación, debe elaborarse un plan claro que detalle os dispositivos e datos que se van adquirir, así como as ferramentas e técnicas que se van empregar para garantir que as evidencias sexan recollidas correctamente.

- **Cadea de Custodia**: A evidencia dixital debe ser rastrexada e documentada desde o momento da súa adquisición ata a súa presentación en xuízo. Isto asegura que a evidencia non foi manipulada, garantindo a súa autenticidade.

- **Rexistro de Métodos, Procedementos e Tecnoloxías**: É fundamental documentar todos os pasos realizados, ferramentas utilizadas e calquera procedemento seguido no proceso de análise. Isto proporciona transparencia e asegura que o proceso pode ser reproducido se é necesario..

## 3. A Evidencia Dixital
A evidencia dixital normalmente está oculta, e o exame forense se encarga de revelala. Pode ser danada con facilidad, e sensible ao tempo e pode cruzar fácilmente fronteiras xuridiscionais. As fontes da evidencia dixital poden ser entre outras cousas, ordenadores, dispositivos móviles, dispositivos independentes (routers, proxys), datos das compañías de telecomunicacións e compañías de servizos...

**Requisitos**

- **Obtida Lícitamente**: A evidencia debe ser adquirida respectando as leis e regulamentos locais e internacionais. Se non se obtén de maneira legal, pode ser inadmisible no xuízo.

- **Orixe Garantido**: Debe poder demostrar que a evidencia provén do dispositivo ou lugar específico, sen dúbidas sobre a súa procedencia.

- **Integridade Garantida**: A integridade da evidencia debe preservarse. Para isto, empréganse técnicas como o hashado de datos, que permite verificar que a información non foi alterada.

- **Pertinente, Útil e Clara**: A evidencia presentada debe ser relevante para o caso, comprensible para o tribunal e útil para o obxectivo de clarificar os feitos investigados.

Un análise forense cumprirá os seus obxectivos coando se revela a circunstancia dun incidente e as súas circunstancias, se coñece a identidade e obxectivo dos atacantes, se coñece o momento exacto do ataque e se teñen as evidencias que o demostran.

## 4. Fases dun análise forense

### 4.1 **Adquisición de Datos**: 

A adquisición é a fase máis crítica, xa que garante que a información se recolle de forma intacta. É común utilizar ferramentas forenses que permiten clonar discos duros, capturar memoria volátil, ou analizar redes sen modificar os datos orixinais. Exemplos de ferramentas inclúen EnCase, FTK (Forensic Toolkit), e WireShark.

Se debe establecer un plan de adquisición sistemáticos que indique os métodos e procedementos de recolección de datos empregados e documentalo exhaustivamente. E particularmente importante que o método de  adquisición non modifique o sistema que se está examinando, polo que a miudo se recurre a facer copias (imaxes de disco) para preservar a integridade dos datos orixinais.

E necesario indicar a tecnoloxía e recursos empregados no análise, o contorno de traballo utilizado e anotar os procedementos seguidos.

Se debe establecer unha cadea de custodia das evidencias obtidas con etapas ben redactadas e documentas:

- Identificación, extracción e rexistro da evidencia
- Medidas de preservación e almacenamento da evidencia
- Traslados da evidencia

Orixes típicos das evidencias dixitais son:

- Contido dos discos (ficheiros, e-mails, ...)
- Arquivos borrados (recuva, testdisk ... etc)
- Historial de conexións a redes (logs)
- Cachés do navegador
- Información de configuración da rede
- Arquivos temporais do sistema e swap
- Contactos, axenda e mensaxería
- Aplicacións instaladas
- Ficheiros descargados e compartidos... etc

Os procesos de adquisición son delicados, e requiren moitas veces de equipamento especial. En particular os análises en quente (co equipo en funcionamento) son os que máis información facilitan, pero son moito máis difíciles de levar a cabo con eficacia. O hardware necesario debe cumplir certos requisitos:

- Debe ser compatible a nivel de conexións con gran cantidade de dispositivos para poder analizar distintos sistemas
- Debe dispoñer de gran espazo de almacenamento para poder gardar as evidencias e facer copias de seguridade
- Se debe valorar o uso de bolsas antiestáticas, xaulas de faraday, cámaras de fotos..
- Se debe dispoñer de softeare de análise de datos

Existen "Suites" de aplicacións especializadas que proporcionan numerosas ferramentas, entre elas Autopsy/Sleuthkit, Digital Forensics Framework, Encase...) e aplicacións de uso común de gran utilidade como dd, editores hexadecimais ... etc.

A adquisición de datos que se debe realizar depende do incidente a analizar. É importante identificar o incidente e notificar aos afectados si a regulación legal o require (LOPD) garantindo a coservación das evidencias:

- Os datos non se adquiren sobre o os dispositivos orixinais que deben preservarse no posible no seu estado orixinal.
- As accións deben axustarse a un plan meditado e previsto. 
- As actuacións son moi diferentes si os equipos están encendidos ou apagados. 
- A actuación sobre equipos apagados se chama análise post-mortem. Nestes casos é máis fácil preservar as evidencias, pero se perde a información volátil. 
- A actuación sobre equipos encendidos se chama análise en vivo. Nestes casos é posible moitas veces acceder a dispositivos cifrados ou ao contido da memoria RAM e os arquivos temporais, pero é moito máis complexa a preservación de evidencias polo que non sempre é posible. 
- A adquisición de datos máis común é a adquisición estática mediante extracción de información de discos fixos, tarxetas SD, memorias USB... xerando unha imaxe que se analizará posteriormente.
- Se debe garantizar que os datos orixinais non son modificados para o que se debe acceder a eles en modo so de lectura, incluso utilizando dispositivos hardware protectores contra escritura. 
- No caso de captura de datos en vivo e importante que tanto o software instalado como o dispositivo destino da captura sexa externo (USB)

A información típica que se recopila é:

- Data e hora do sistema
- Instantánea dos dispositivos de almacenamento e busca de arquivos borrados  (dd, FTK Imager, Caine Linux,GuyManager).
- Portos TCP/UDP activos e aplicacións conectadas ou en espera de conexión.
- Usuarios activos no sistema
- Procesos en funcionamento no sistema
- Configuración de rede (ip, rutas e caché ARP)
- Logs do sistema
- Análise do tráfico de rede
- Copias de memoria: /dev/mem, LIME (lime-forensics-dkms, FTK Imager)

E común o uso de harware especializado, como Clonadores de disco, bloqueadores de escritura ou  estacións forenses. ( https://ondatashop.com/equipo-forense-velociraptor-7) 

E moi importante evitar a escritura no disco orixinal, para o que e imprescindible montalo en so lectura utilizando si é necesario bloqueadores de escritura hardware / Clonadoras de disco. Unha firma hash MD5 ou SHA-1 pode garantizar a integridade das imaxes obtidas.
Implica a recolección de evidencias dixitais de forma que se manteña a integridade dos datos. Isto require o uso de ferramentas específicas para clonar discos duros, capturar a memoria RAM, rexistros de rede ou calquera outro dato relevante.

### 4.2 **Análise de Datos**: 

Unha vez adquiridos os datos, comeza o proceso de análise para identificar patróns, anomalías ou rastros que poidan indicar actividade maliciosa. Utilízanse técnicas de recuperación de datos, inspección de arquivos, e análises de tráfico de rede.

Durante a análise, os expertos en forense dixital revisan rexistros de eventos, acceden a arquivos eliminados ou ocultos, investigan metadatos, e buscan rastros que apunten a actividades sospeitosas. Utilízanse métodos como a análise de correo electrónico, estudos de malware ou rastreo de enderezos IP. Podemos distinguir varios pasos:

- Identificación de evidencias
  - As ferramentas de análise de imaxes de disco nos proporcionan acceso ao contido aínda que fora borrado.
  - Se deben definir os criterios de busca segundo a investigación a realizar
  - Mediante “carving” é posible extraer información eliminada (photorec/testdisk, scalpel, foremost,WinUndelete ...)
  - Os metadatos presentes no arquivo facilitan información importante (datas de creación, autores do documento, modificacións, procedencia...)
- Aseguramento das evidencias
  - Deben almacenarse en lugares de acceso restrinxido e con control ambiental 
  - Se debe traballar con protección contra picos de corrente ou cortes de luz, nun ambiente limpo e estable.
  - No caso de dispositivos móbiles deben usarse jaulas de Faraday e usar packs de baterías para evita que se descarguen. O dispositivo rexistrará ese feito que se debe documentar. 
- Documentación das evidencias
- Establecemento da cadea de custodia

### 4.3 **Informe de Conclusións**: 
Tras a análise, elabórase un informe detallado que inclúe todas as evidencias, métodos empregados, e conclusións baseadas nos achados. Este documento servirá para presentar a investigación en xuízos ou auditorías.

## 5. Normativa
A normativa en análise forense dixital inclúe tanto leis locais como estándares internacionais que rexen a recolección e presentación de evidencias. Algunhas das normativas máis comúns son:

- **ISO/IEC 27037**: Recomendacións sobre a identificación, colección e preservación de evidencias dixitais.
- **Lei de Protección de Datos**: Leis nacionais como o RGPD (Regulamento Xeral de Protección de Datos) que afectan a forma en que a información persoal pode ser utilizada nunha investigación.
- **Chain of Custody Requirements**: Regras para manter a integridade da evidencia a través do seu ciclo de vida.