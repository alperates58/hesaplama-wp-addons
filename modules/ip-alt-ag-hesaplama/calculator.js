function hcIpSubnetHesapla() {
    const ipStr = document.getElementById('hc-is-ip').value;
    const cidr = parseInt(document.getElementById('hc-is-cidr').value);

    const ipMatch = ipStr.match(/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/);
    if (!ipMatch) {
        alert('Lütfen geçerli bir IPv4 adresi girin.');
        return;
    }

    const ipParts = ipMatch.slice(1).map(Number);
    if (ipParts.some(p => p > 255)) {
        alert('IP bölümleri 255\'ten büyük olamaz.');
        return;
    }

    const ipInt = (ipParts[0] << 24) | (ipParts[1] << 16) | (ipParts[2] << 8) | ipParts[3];
    const maskInt = cidr === 0 ? 0 : (0xFFFFFFFF << (32 - cidr)) >>> 0;
    
    const netInt = (ipInt & maskInt) >>> 0;
    const broadInt = (netInt | ~maskInt) >>> 0;
    const numHosts = (cidr >= 31) ? 0 : (broadInt - netInt - 1);

    function intToIp(int) {
        return [(int >>> 24) & 0xFF, (int >>> 16) & 0xFF, (int >>> 8) & 0xFF, int & 0xFF].join('.');
    }

    document.getElementById('hc-is-res-net').innerText = intToIp(netInt);
    document.getElementById('hc-is-res-broad').innerText = intToIp(broadInt);
    document.getElementById('hc-is-res-hosts').innerText = (numHosts < 0 ? 0 : numHosts).toLocaleString('tr-TR');
    document.getElementById('hc-is-res-mask').innerText = intToIp(maskInt);
    
    document.getElementById('hc-is-result').classList.add('visible');
}
