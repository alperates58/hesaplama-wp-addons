function hcIpAltAgMaskesiHesapla() {
    var ipStr = document.getElementById('hc-sub-ip').value.trim();
    var cidr = parseInt(document.getElementById('hc-sub-cidr').value);

    // IP doğrulama
    var ipReg = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    if (!ipReg.test(ipStr)) {
        alert('Lütfen geçerli bir IPv4 adresi girin (örn: 192.168.1.1).');
        return;
    }

    var match = ipStr.match(ipReg);
    var o1 = parseInt(match[1]);
    var o2 = parseInt(match[2]);
    var o3 = parseInt(match[3]);
    var o4 = parseInt(match[4]);

    // IP sınıfı belirleme
    var ipClass = 'C';
    if (o1 >= 1 && o1 <= 126) ipClass = 'A';
    else if (o1 >= 128 && o1 <= 191) ipClass = 'B';
    else if (o1 >= 192 && o1 <= 223) ipClass = 'C';
    else if (o1 >= 224 && o1 <= 239) ipClass = 'D (Multicast)';
    else if (o1 >= 240 && o1 <= 255) ipClass = 'E (Deneysel / Ar-Ge)';
    else if (o1 === 127) ipClass = 'Yerel Döngü (Loopback - 127.x.x.x)';

    // IP Adresini 32-bit Unsigned tam sayıya çevirme
    var ipInt = (o1 * 16777216) + (o2 * 65536) + (o3 * 256) + o4;

    // Subnet Maskesi tam sayısı
    var maskInt = 0;
    if (cidr > 0) {
        maskInt = Math.pow(2, 32) - Math.pow(2, 32 - cidr);
    }

    // Network adresi tam sayısı
    // Bitwise AND operation in JS is signed 32-bit, so we do it safely:
    var netInt = (ipInt & maskInt) >>> 0;

    // Wildcard maskesi
    var wildInt = (~maskInt) >>> 0;

    // Broadcast adresi
    var broadInt = (netInt | wildInt) >>> 0;

    // Tam sayıları IP stringine dönüştürme fonksiyonu
    var intToIp = function(num) {
        var d = num & 255;
        var c = (num >> 8) & 255;
        var b = (num >> 16) & 255;
        var a = (num >> 24) & 255;
        return a + '.' + b + '.' + c + '.' + d;
    };

    var subnetMask = intToIp(maskInt);
    var networkAddress = intToIp(netInt);
    var broadcastAddress = intToIp(broadInt);

    // Host aralığı ve adet hesabı
    var hostCount = 0;
    var rangeText = '';

    if (cidr === 32) {
        hostCount = 1;
        rangeText = ipStr + ' (Tek bir cihaz / Ana bilgisayar)';
    } else if (cidr === 31) {
        hostCount = 2;
        rangeText = intToIp(netInt) + ' - ' + intToIp(broadInt) + ' (Noktadan Noktaya Link - RFC 3021)';
    } else {
        hostCount = Math.pow(2, 32 - cidr) - 2;
        var rangeStart = intToIp(netInt + 1);
        var rangeEnd = intToIp(broadInt - 1);
        rangeText = rangeStart + ' - ' + rangeEnd;
    }

    // IP Binary gösterimi
    var toBinaryStr = function(val) {
        var str = val.toString(2);
        while (str.length < 32) {
            str = '0' + str;
        }
        return str.substring(0, 8) + '.' + str.substring(8, 16) + '.' + str.substring(16, 24) + '.' + str.substring(24, 32);
    };

    var ipBinary = toBinaryStr(ipInt);
    var maskBinary = toBinaryStr(maskInt);

    var binaryHtml = 'IP:   ' + ipBinary + '<br>Mask: ' + maskBinary;

    document.getElementById('hc-sub-res-class').textContent = ipClass;
    document.getElementById('hc-sub-res-mask').textContent = subnetMask + ' (/' + cidr + ')';
    document.getElementById('hc-sub-res-net').textContent = networkAddress;
    document.getElementById('hc-sub-res-broad').textContent = broadcastAddress;
    document.getElementById('hc-sub-res-range').textContent = rangeText;
    document.getElementById('hc-sub-res-hosts').textContent = hostCount.toLocaleString('tr-TR');
    document.getElementById('hc-sub-res-binary').innerHTML = binaryHtml;

    document.getElementById('hc-subnet-result').classList.add('visible');
}
