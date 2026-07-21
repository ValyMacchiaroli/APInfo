## RELAZIONE – PROJECT WORK: Semantic Hardware Finder

Gruppo:

- Eleonora Giuliani

- Eros Ibarra

- Alexander Santagati

- Valy Macchiaroli

## SEZIONE 1:

-DESCRIZIONE PROGETTO

Web app di prodotti informatici che date le caratteristiche descritte dall’utente trova i prodotti più rilevanti e li elenca in base a quanto combaciano alla descrizione data.

Nel momento della ricerca all’utente vengono mostrati tre prodotti con l’immagine, il nome del modello e le parole chiave che combaciano con la descrizione.

Quando l’utente seleziona il prodotto gli viene mostrata tutta la pagina delle specifiche tecniche e il link ufficiale dove acquistarlo.

Esempio di ricerca dell’utente: “Mi serve un tablet con penna e tastiera adatto all’università con cui prendere appunti con buona memoria (min 128 GB) economico e con batteria che duri tutto il giorno.”

Il sistema analizza tramite algoritmo di intelligenza artificiale il testo che l’utente inserisce e restituisce i tre prodotti che più si avvicinano alla descrizione data presenti nel database.

Per ciascuno mostra:

- \- Immagine del prodotto

- \- Nome del modello

- \- Le parole chiave (tag) che evidenziano perché quel prodotto combacia con la descrizione dell'utente (es. penna, tastiera, 128GB, economico, lunga durata)

Cliccando su uno dei 3 prodotti, l'utente viene indirizzato alla pagina con la scheda tecnica completa e dettagliata del dispositivo selezionato.

-OBIETTIVI CHE SI VUOLE RAGGIUNGERE

Con la web app si vuole semplificare la ricerca che si fa del prodotto, l’esigenza primaria è quella di ottimizzare il processo di richiesta, ovvero ridurre i tempi di ricerca e massimizzare la soddisfazione del cliente.

Inoltre si vuole creare un’interfaccia semplice e facile da usare per tutti tipi di utenti (user- friendly), indipendentemente dalle loro capacità tecniche.


Il database dovrà contenere tutti i prodotti che verranno trovati attraverso il processo di web- scraping e, tramite il sito, verranno comparati tra di loro in un’unica pagina web durante la ricerca sotto descrizione del cliente.

## SEZIONE 2:

## -ANALISI DEI REQUISITI: COSA VI SERVE PER OTTENERE IL GOAL?

I servizi devono essere contenuti in container docker separati compilati nello stesso file docker-compose.yml.

Inoltre deve essere presente un algoritmo di intelligenza artificiale che analizza il contenuto semantico della descrizione data dall’utente e lo compara con i prodotti presenti nel database.

A questo scopo, il modello di database necessario sarà di tipo vettoriale, per permettere all’IA di indicare gli elementi che corrispondono alla descrizione.

Per il lato front-end sarà presente un sito web scritto in HTML e PHP che permette l’interfacciarsi dell’utente con l’algoritmo IA e di conseguenza di ottenere i risultati della ricerca.

## -ANALISI DEI COSTI:

Il costo di tutta l’infrastruttura in locale verrebbe ad ammontare in una spesa immediata di 1200€ e un costo mensile che va dai 40€ ai 70€ per l’elettricità, a cui vanno aggiunti il raffreddamento del server e la manutenzione.

Nel caso in cui si decidesse di usare l’opzione cloud per costruire l’infrastruttura, bisognerebbe considerare dei costi variabili tra i 105€ e 211€ al mese (1265€ - 2531€ all’anno) che includono EC2 per quattro container, S3 storage 1TB con gestione dei backup, OpenSearch e requisiti di networking.

## -ANALISI DEI POSSIBILI RISCHI CHE IL PROGETTO DEVE CONSIDERARE

I rischi che dovremmo considerare nella fase di sviluppo, di deployment e di maintenance sono molteplici.

Il primo tra tutti, e quello più grave, è sicuramente un outage della web app con conseguente indisponibilità del servizio e possibile perdita di dati.

Inoltre quando l’utente descrive il prodotto che ricerca potrebbe esprimersi in maniera tale che l’IA ha difficoltà a capire le sue vere esigenze dando risultati errati.

Un’ulteriore problematica potrebbe essere la presenza di dati parziali a causa dei limiti imposti dai diversi siti agli algoritmi di web-scraping.


Infine potrebbe esserci la possibilità che gli utenti si imbattano in truffe a causa di un inganno da parte del venditore (es. acquisto di un prodotto che non rispetta i dati forniti dal venditore distorcendo le aspettative del cliente).

## SEZIONE 3:

## -ARCHITETTURA DEL SISTEMA E STACK TECNOLOGICO

L’architettura del sistema è composta da una base costruita con docker che suddivide i vari servizi di cui usufruirà il sito.

Per semplificare il processo di testing, è opportuno impostare un dns che rimandi al sito web che si sta sviluppando (es. bind9, technitium).

Il sito viene scritto in HTML e PHP, che permette la connessione con l’algoritmo d’intelligenza artificiale che compirà la ricerca semantica all’interno del database vettoriale.

L’algoritmo di web scraping dovrà cercare prodotti da siti attendibili, filtrandoli in base alla loro tipologia (computer fissi, portatili, cellulari, tablet) e strutturando i dati raccolti per l’inserimento automatico dentro il database.


Tutto può essere implementato in un server cloud, come AWS, nel quale creare una macchina virtuale EC2 che conterrà i file necessari per il funzionamento dei servizi in docker; uno storage S3 per immagazzinare i dati raccolti nel database, assicurandosi che il processo di ricerca rimanga performante anche in presenza di un’importante mole di dati.

Per la creazione del database vettoriale è possibile sia creare un container docker contenente memsearch, che utilizzare il servizio in AWS di OpenSearch, entrambi mirati all’uso di “machine learning” per la ricerca dei contenuti.


## SEZIONE 4:

## -TIMELINE E DISTRIBUZIONE DEI LAVORI NELLE 40 ORE

Nelle prime quattro ore è stato deciso il progetto, analizzati i dati ed i software necessari e decisa la struttura del piano di sviluppo, nonché le esigenze che verranno trattate.

Una volta deciso lo schema di lavoro, si inizia a sviluppare la web app partendo, in contemporanea, dalla scrittura del docker-compose.yml e la creazione dei container con lo sviluppo del DNS, nonché il server del sito web.

Una volta completata la scrittura dei servizi, si passa alla creazione delle pagina principali e i primi test per collegare l’algoritmo IA al sito.

Successivamente, si crea e si popola il database con diversi prodotti a mano per testare le funzionalità dell’applicazione e collegare l’intelligenza artificiale semantica.

Confermata il corretto funzionamento del DB, si sviluppa l’algoritmo di web-scraping che andrà ad aggiungere i prodotti con tutte le informazioni importanti trovate.

Per tutta la durata delle 40 ore di sviluppo del progetto, si manterrà un costante canale di comunicazione con tutto il team per far rendiconto del lavoro svolto.


## SEZIONE 5:

## -CONCLUSIONI E CONSIDERAZIONI FINALI

Dopo aver presentato il progetto nella sua interezza, procediamo a fare le osservazioni finali.

Innanzitutto, possiamo vedere sin da subito una differenza sostanziale tra le due opzioni descritte.

Con un’infrastruttura cloud abbiamo una maggiore elasticità che permette di sostenere carichi variabili (durante il Black Friday sono nettamente più alti rispetto al resto dell’anno), un costo CapEx non esistente ed una tariffa mensile basata sul modello pay-as-you-go, ovvero paghi per quanto usi.

Inoltre, essendo che i dati non sono di natura sensibile, è possibile utilizzare il cloud per lo storage di tutti i dati, senza dover sviluppare un cloud ibrido con un database in locale; per le regole del GDPR, rimane consigliabile affittare uno storage presente all’interno dell’UE.

Altro punto a favore è la possibilità di incorporare un piano di HA in qualsiasi momento anche dopo la creazione del servizio, cosa che richiederebbe costi onerosi nel caso di un’infrastruttura locale.

Nel caso in cui si dovesse decidere di utilizzare l’opzione in locale, si dovrà tenere conto dei costi di manutenzione e, eventualmente, sostituzione dei componenti hardware tendenzialmente elevati (specialmente oggigiorno per quanto riguarda la RAM).

Per facilitare la sostenibilità della web app, si possono inserire banner pubblicitari e sponsor all’interno delle pagine web.

Rimane da considerare che l’obiettivo primario del progetto non è di fare soldi, ma di facilitare la ricerca degli utenti e, di conseguenza, creare una reputazione positiva.

In conclusione, decidere di utilizzare l’opzione cloud per la realizzazione della web app risulterebbe essere l’opzione più vantaggiosa per limitare i costi, ridurre il carico di lavoro sui dipendenti e facilitare l’espansione in un futuro.
