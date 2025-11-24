# Copia de los vidios
# principio basico
En el mundo digital, las fortalezas mñas imponentes son puestas a prueba a diario por espías expertos.  

La Triada CIA: Los tres objetivos de la seguridad:  
Confiedenciadlidad, Inegridad y Disponibilidad.  

- Confidencialidad:
  - Objetivo: Solo acceso autroizado.
  - Métodos: Cifrado y control de acceso.
- Integridad
  - Obejtivo: Evitar alteraciones.
  - Método. Hashing y Firmas Digitales.
- Disponibilidad
  - Objetivo: Acceso a datos sin interrupción.
  - Métodos: Redundancia, Backups

Protege el hardware e infraestrutura(CPDs) contra robos, daños o desatres. Ej: cámaras, SAI

Protege datos y software contra ciberataques y accesos no autorizados. Ej: cortafuegos, antivirus.

Guardias: Medidas proacticas que previenen y responden a amenazas en tiempo real. Ej: Cortafuegos, IDS.

Muros: Medidas que minimizan el impacto de un ataque. Su foco es la recuperación. Ej. Cifrado, backups.

¿Cómo sabemos que las defensas de verdad funcionan?

Penetration Testing(Pentesting)  
Método de auditoria que simula un ataque real para localizar las debilidades de un sistema.  
Fases:  
1. Contrato: Definir legalmente el alcance, los sistemas y las notificaciones.
2. Reconocimiento: Recopilar info pública(Footprinting) y escanear sistemas(Fingerprinting).
3. Análisis: Identificar posibles debilidades en los sistemas, software y configuraciones.
4. Explotación: Intentar explotar vulnerabilidades identificadas para simular un ataque.

Análisis Forense Digital  
Proceso para identificar, preservar, analizar y documentar pruebas digitales para procesos legales.

¿Qué es una Prueba Digital?  
Cualquier dato electrónico. Ej: emails, logs, archivos borrados, caché, RAM.

La evidencia debe ser rastreada y documentada desde su adquisición hasta el juicio para garantizar su autenticidad.

Fase:
1. Adquisición: Recolectar pruebas digitales preservando la integridad de los datos originales.
2. Análisis: Examinar los datos para encontrar patrones y rastros de actividad maliciosa.
3. Informe: Documentar hallazgos, métodos y conclusiones en un informe pericial formal.

Los hallazgos del pentesting y el análisis forense se usan para construir defensas más fuertes y guardias más intelifentes.

# Construíndo a fortaleza dixital
¿Que teñen en común unha carta, unha caixa forte e un xerador?  
Todos protexen algo valioso. Os teus datos son un tesouro, e a ciberseguridade é o plano da túa fortaleza dixital.

A Tríada CIA
Os tres principios básicos da seguridade da información: Confidencialidade, Integridade e Dispoñibilidade.


| Principio         | Obxectivo                            | Metáfora                        |
| ----------------- | ------------------------------------ | ------------------------------- |
| Confidencialidade | Garantir que os datos son secretos   | A Mensasxe Cifrada              |
| Integridade       | Garantir que os datos son fiables    | O Selo a Proba de Manipulacións |
| Dispoñibilidade   | Garantir que os datos son accesibles | A Chave Sempre Dispoñible       |

### Confidencialidade
A información só debe ser accsible por quen teña autorización.  
A principal ferramenta para a confidencialidade é a Criptografía: a ciencia de transformar datos a un formato ilexible.

Usa unha soa chave para cifrar e descifrar. Rápido pero compartir a chave é un risco
Usa dúas chaves(pública e privada). A chave pública compártese sen risco. Máis seguro.

Paso Cifrado Híbrido:
1. Crear: Cráse unha chave simétrica aleatoria para cifrar a mensaxe principal.
2. Cifrar: A chave simétrica cifrase usando a chave pública do destinatario.
3. Descifrar: O destinatario usa a súa chave privada para obter a chave simétrica.

### Integridade
A integirdade garante que a información non foi modificada de forma non autorizada ou accidental.

Hash  
Unha función que trasforma datos de lonxitude variable nunha cadea de lonxitude fixa e irreversible.

Propiedades dun Hash:
- Irreversibilidade: Non se pode reconstruir a entrada orixinal.
- Determinismo: A mesma entrada sempre xera o mesmo hash.
- Efecto Avalancha. Unha pequeno cambio na entrada altera draticamente o hash.
- Anti-colisións. Case imposible que dúas entradas xeren o mesmo hash.

Paso Sinatura Dixital:
1. Hash: Créase un hash(pegada dixital) único do documento.
2. Cifrar: O hash cifrase coa chave privada do remitente. Esa é a 'sinatura'.
3. Verficar: O receptor usa a chave pública para verficar que o hash coincide.

### Dispoñibilidade
Debe garantirse que os datos están accesibles polos usuarios autorizados sempre que se necesiten.

Ter compoñentes duplicados para asumir funcións en caso de fallo e garantir a continuidade.
Realizar copias periódicas de datos para recuperar a información en caso de desastre.

Técnicas de alta disp.
- Hardware redundante: fontes de alimentación(SAI), disco(RAID).
- Balanceo de carga: distribúe solicitades entre varios servidores
- Redundnacia de rede: múltiples conexións para evitar fallos
- Xeorreplicación. copias de servizos en varias localizacións.

Protexe o hardware e as instalacións de ameazas físicas como roubo, lume ou desastres.
Protexe os datos e o software de ameazas dixitais como malware, virus ou ataques.

Non Repudio  
A garantía de que unha entidade non pode negar ter realizado unha acción, como enviar ou recibir datos.

# Seguridade Activa vs. Pasiva
### Seguridade Activa  
Medidas proactivas para previr, detectar e responder a ameazas de seguridade en tempo real.

Características Clave  
- Monitorización constante
- Resposta inmediata
- Detección temperá

O obxectivo é mitigar un ataque antes de que poida causar un dano significativo.  
Controlan o tráfico de rede entrante e saínte, bloqueando o acceso non autorizado.  
- O vixia(IDS): Detecta actividades malicionsas e alerta aos administradores.
- O Defensor(IPS): Detevta actividades maliciosas e bloquéaas activamente.

Paso Autenticación(MFA):
1. Contrasinal: O usuario introduce o seu contrasinal.
2. Verficación: Proporciónase unha segunda forma de verificación.
3. Acceso: O acceso é concedido con éxito.

### Seguridae Pasiva
Medidas para minimizar o impacto dun incidente e para resistri os efectos dun ataque.

Caractristicas Clave
- Protección preventiva
- Resiliencia
- Mitigación do impacto

Protexe os datos cun código secreto. Aínda que sexan roubados, non poderán ser lidos.  
Copias de datos críticos que permiten a restauración da información en caos de perda ou ataque.  
Reduce a superficie de ataque desactivando servizos e portos innecesarios.  


| Aspecto   | Seguridade Activa(Gardas) | Seguridade Pasiva(Muros) |
| --------- | ------------------------- | ------------------------ |
| Obxectivo | Responder en tempo real   | Minimizar dano           |
| Enfoque   | Proactivo                 | Reactivo/Preventivo      |
| Resposta  | Bloquea ameazas           | Reduce o impacto         |
| Exemplos  | Cortalumes, IPS           | Cifrado, Backups         |
