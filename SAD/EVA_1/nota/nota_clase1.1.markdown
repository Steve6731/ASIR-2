__________________________________________________________
  **1.**  **Principios Básicos da Seguridade Informática**
==========================================================
> - Confidencialidade, Integridade, Dispoñibilidade e Non Repudio
> - Seguridade Física e Seguridade Lóxica
> - Vulnerabilidades, Ameazas e Ataques
----------------------------------
<center>
 <font color="yellow">
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
<center>
 <font color="yellow">
  ⇓ pagina 2 ⇓
 </font>
</center>

----------------------------------

## **1.1. Confiencialidade**

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
- 
----------------------------------
<center>
 <font color="yellow">
  ⇓ pagina 3 ⇓
 </font>
</center>

----------------------------------
