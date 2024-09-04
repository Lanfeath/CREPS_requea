<?xml version="1.0" encoding="utf-8" ?>
<configuration>
    <system.serviceModel>
        <bindings>
        <basicHttpBinding>
            <binding name="WsCalendarEvent" closeTimeout="00:01:00" openTimeout="00:01:00"
                receiveTimeout="00:10:00" sendTimeout="00:01:00" allowCookies="false"
                bypassProxyOnLocal="false" hostNameComparisonMode="StrongWildcard"
                maxBufferSize="65536" maxBufferPoolSize="524288" 
                maxReceivedMessageSize="65536"
                messageEncoding="Text" textEncoding="utf-8" transferMode="Buffered"
                useDefaultWebProxy="true">
                <readerQuotas maxDepth="32" maxStringContentLength="8192" 
                maxArrayLength="16384"
                maxBytesPerRead="4096" maxNameTableCharCount="16384" 
            />
                <security mode="Transport">
                    <transport clientCredentialType="Basic" realm="" />
                </security>
            </binding>
        </basicHttpBinding>
        </bindings>
        <client>
            <endpoint address="http://https://creps-toulouse.requea.com/dysoweb/ws/soap.ws"
            binding="basicHttpBinding" bindingConfiguration="WsCalendarEvent" 
            contract="CalendarEvent. WsCalendarEvent"
            name="WsCalendarEvent" />
        </client>
    </system.serviceModel>
</configuration>

<?php

WsCalendarEventClient $client = new WsCalendarEventClient();
client.ClientCredentials.UserName.UserName = "ya.vigier";
client.ClientCredentials.UserName.Password = "Creps2018";

//Création des paramètres de la requête
rqWsEventSearch searchForm1 = new rqWsEventSearch();
DateTime dtStart = new DateTime(2022, 1, 1, 8, 30, 0, 00, DateTimeKind.Utc);
DateTime dtEnd = DateTime.Today;
searchForm1.rqFromDate = dtStart;
searchForm1.rqToDate = dtEnd;
searchForm1.rqRoomNumber = "S001";

//récupération de la réponse
List<rqWsResourceResaCalendarEvent> lstEvents = 
client.SearchResaByDate(searchForm1);

foreach (rqWsResourceResaCalendarEvent item in lstEvents)
{
    String beneficiary = item.rqBeneficiary;//Nom du bénéficiaire ex: 'Test Requea'
    String description = item.rqDescription;//Commentaire sur la réservation
    DateTime startDate = item.rqStartTime;//début de la réservation
    DateTime endDate = item.rqEndTime;//fin de la réservation
    String title = item.rqTitle;//intitulé de la réservation
    String location = item.rqLocation;//localisation ex:'/S1/Build1/Floor1/S001/'
    String roomTitle = item.rqRoom;//Nom de la salle ex: Salle 001
    String eventTitle = item.rqEvent;//Evenement lié à la réservation
}
?>