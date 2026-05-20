function hcCidrYontemDegisti() {
    var yontem = document.getElementById('hc-cidr-yontem').value;
    var hostGr = document.getElementById('hc-cidr-host-gr');
    var aralikGr = document.getElementById('hc-cidr-aralik-gr');

    if (yontem === 'host') {
        hostGr.style.display = 'block';
        aralikGr.style.display = 'none';
    } else {
        hostGr.style.display = 'none';
        aralikGr.style.display = 'block';
    }
}

function hcCidrAgAdresiHesapla() {
    var yontem = document.getElementById('hc-cidr-yontem').value;

    var ipReg = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    
    var intToIp = function(num) {
        var d = num & 255;
        var c = (num >> 8) & 255;
        var b = (num >> 16) & 255;
        var a = (num >> 24) & 255;
        return a + '.' + b + '.' + c + '.' + d;
    };

    var ipToInt = function(ipStr) {
        var match = ipStr.match(ipReg);
        var o1 = parseInt(match[1]);
        var o2 = parseInt(match[2]);
        var o3 = parseInt(match[3]);
        var o4 = parseInt(match[4]);
        return (o1 * 16777216) + (o2 * 65536) + (o3 * 256) + o4;
    };

    if (yontem === 'host') {
        var baseIpStr = document.getElementById('hc-cidr-ip-taban').value.trim();
        var hostReq = parseInt(document.getElementById('hc-cidr-gereken-host').value);

        if (!ipReg.test(baseIpStr)) {
            alert('Lütfen geçerli bir taban IP adresi girin.');
            return;
        }
        if (isNaN(hostReq) || hostReq <= 0) {
            alert('Lütfen gereken host sayısını 0\'dan büyük girin.');
            return;
        }

        var baseInt = ipToInt(baseIpStr);

        // n = 32 - ceil(log2(H + 2))
        // H+2 çünkü Ağ ve Broadcast adresleri çıkarılır.
        var bits = Math.ceil(Math.log2(hostReq + 2));
        var cidr = 32 - bits;
        if (cidr < 0) cidr = 0;

        // Özel durumlar (hostReq 1 veya 2 olduğunda)
        if (hostReq === 1) cidr = 32;
        if (hostReq === 2) cidr = 31;

        var maskInt = cidr === 0 ? 0 : (Math.pow(2, 32) - Math.pow(2, 32 - cidr));
        var netInt = (baseInt & maskInt) >>> 0;
        var wildInt = (~maskInt) >>> 0;
        var broadInt = (netInt | wildInt) >>> 0;

        var capacity = cidr === 32 ? 1 : (cidr === 31 ? 2 : (Math.pow(2, 32 - cidr) - 2));

        document.getElementById('hc-cidr-res-gosterim').textContent = intToIp(netInt) + ' /' + cidr;
        document.getElementById('hc-cidr-res-mask').textContent = intToIp(maskInt);
        document.getElementById('hc-cidr-res-kapasite').textContent = capacity.toLocaleString('tr-TR') + ' kullanılabilir host';
        document.getElementById('hc-cidr-res-blog').textContent = intToIp(netInt) + ' - ' + intToIp(broadInt);

    } else {
        var startIpStr = document.getElementById('hc-cidr-ip-bas').value.trim();
        var endIpStr = document.getElementById('hc-cidr-ip-bit').value.trim();

        if (!ipReg.test(startIpStr) || !ipReg.test(endIpStr)) {
            alert('Lütfen geçerli başlangıç ve bitiş IP adresleri girin.');
            return;
        }

        var startInt = ipToInt(startIpStr);
        var endInt = ipToInt(endIpStr);

        if (startInt > endInt) {
            alert('Başlangıç IP adresi bitiş IP adresinden büyük olamaz.');
            return;
        }

        // En yakın ortak prefix'i bul (startInt ve endInt XOR'u ile en soldaki farklı bit)
        var diff = startInt ^ endInt;
        var cidr = 32;
        if (diff > 0) {
            cidr = 32 - Math.floor(Math.log2(diff) + 1);
        }

        var maskInt = cidr === 0 ? 0 : (Math.pow(2, 32) - Math.pow(2, 32 - cidr));
        var netInt = (startInt & maskInt) >>> 0;
        var wildInt = (~maskInt) >>> 0;
        var broadInt = (netInt | wildInt) >>> 0;

        var capacity = cidr === 32 ? 1 : (cidr === 31 ? 2 : (Math.pow(2, 32 - cidr) - 2));

        document.getElementById('hc-cidr-res-gosterim').textContent = intToIp(netInt) + ' /' + cidr;
        document.getElementById('hc-cidr-res-mask').textContent = intToIp(maskInt);
        document.getElementById('hc-cidr-res-kapasite').textContent = capacity.toLocaleString('tr-TR') + ' kullanılabilir host';
        document.getElementById('hc-cidr-res-blog').textContent = intToIp(netInt) + ' - ' + intToIp(broadInt);
    }

    document.getElementById('hc-cidr-result').classList.add('visible');
}
