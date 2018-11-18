<div class="{{'modal fade bd-example-modal-lg'.$key->id}}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <table style="max-width: 200px;">
                <tr>
                    <td><b>№</b></td>
                    <td><b>{{__('validation.other.'.'Stock')}}</b></td>
                    <td><b>{{__('validation.other.'.'Producer')}}</b></td>
                    <td><b>{{__('validation.other.'.'Address')}}</b></td>
                    <td><b>{{__('validation.other.'.'Produced')}}</b></td>
                    <td><b>{{__('validation.other.'.'Expiration')}}</b></td>
                    <td><b>{{__('validation.other.'.'Phone')}}</b></td>
                    <td><b>{{__('validation.other.'.'Mail')}}</b></td>
                    <td><b>{{__('validation.other.'.'Arrival')}}</b></td>
                </tr>
                <tr>
                    <td><br><br>
                    <td>
                </tr>
                <tr>
                    <td>
                        @if(($key->characteristic)['id'] &&
                        (($key->characteristic)['id'] != null) &&
                        (($key->characteristic)['id'] != ''))
                        {{ ($key->characteristic)['id'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['stock'] &&
                        (($key->characteristic)['stock'] != null) &&
                        (($key->characteristic)['stock'] != ''))

                        {{ ($key->characteristic)['stock'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['producer'] &&
                        (($key->characteristic)['producer'] != null) &&
                        (($key->characteristic)['producer'] != ''))

                        {{ ($key->characteristic)['producer'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['address'] &&
                        (($key->characteristic)['address'] != null) &&
                        (($key->characteristic)['address'] != ''))

                        {{ ($key->characteristic)['address'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['produced'] &&
                        (($key->characteristic)['produced'] != null) &&
                        (($key->characteristic)['produced'] != ''))

                        {{ ($key->characteristic)['produced'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['expiration'] &&
                        (($key->characteristic)['expiration'] != null) &&
                        (($key->characteristic)['expiration'] != ''))

                        {{ ($key->characteristic)['expiration'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['phone'] &&
                        (($key->characteristic)['phone'] != null) &&
                        (($key->characteristic)['phone'] != ''))

                        {{ ($key->characteristic)['phone'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['mail'] &&
                        (($key->characteristic)['mail'] != null) &&
                        (($key->characteristic)['mail'] != ''))

                        {{ ($key->characteristic)['mail'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                    <td>
                        @if(($key->characteristic)['arrival'] &&
                        (($key->characteristic)['arrival'] != null) &&
                        (($key->characteristic)['arrival'] != ''))

                        {{ ($key->characteristic)['arrival'] }}
                        @else
                        <h3> - </h3>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>