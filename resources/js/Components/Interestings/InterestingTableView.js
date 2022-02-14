import {
  Avatar,
  AvatarGroup,
  Table,
  Thead,
  Tbody,
  Tfoot,
  Tr,
  Th,
  Td,
  Flex,
  Text,
  Center,
  Square,
} from '@chakra-ui/react'
import { ButtonIconReload } from '@/Components'

const TableView = ({ interesting }) => {
  console.dir(interesting)
  const handleClick = (e) => {
    console.dir(e)
  }

  const capitalize = (s) => s[0].toUpperCase() + (s.slice(1)).toLowerCase();

  return (
    <>
      {interesting.data && (
        <Table size="sm">
          <Thead>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>ประเภท</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Thead>
          <Tbody>
            {interesting.data.map((i, x) => (
              <Tr key={i.id}>
                <Td>{x + 1}</Td>
                <Td>Crypto</Td>
                <Td>
                  <Flex>
                    <Center>
                      <Avatar
                        size="xs"
                        src={i.exchange_id.image_url}
                      />
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {capitalize(i.exchange_id.name)}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td>
                  <Flex>
                    <Center>
                      <AvatarGroup size="xs" max={2}>
                        <Avatar
                          name={i.asset_id.symbol}
                          src={`/storage/crypto/${(i.asset_id.symbol).toLowerCase()}.png`}
                        />
                        <Avatar
                          size="xs"
                          name={i.currency_id.currency}
                          src={i.currency_id.flag_url}
                        />
                      </AvatarGroup>
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                      {i.asset_id.symbol}/{i.currency_id.currency}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td isNumeric>{i.last_price}</Td>
                <Td isNumeric>{i.last_percent}%</Td>
                <Td>{i.updated_at}</Td>
                <Td>
                  <ButtonIconReload handleClick={handleClick} />
                </Td>
              </Tr>
            ))}
          </Tbody>
          <Tfoot>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>ประเภท</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Tfoot>
        </Table>
      )}

      <div className="mx-auto p-6">
        <div className="btn-group">
          <button className="btn btn-sm">1</button>
          <button className="btn btn-sm">2</button>
          <button className="btn btn-sm">3</button>
          <button className="btn btn-sm btn-disabled">...</button>
          <button className="btn btn-sm">99</button>
          <button className="btn btn-sm">100</button>
        </div>
      </div>
    </>
  )
}

export default TableView
