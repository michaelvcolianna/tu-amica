<table>
    <thead>
        <tr>
            <th class="tcol-1">
                <span>{{ $language->switching_from }}</span>
            </th>

            <th class="tcol-2">
                <span>{{ $language->average_savings }}</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @include( 'table.' . $route )
    </tbody>
</table>
