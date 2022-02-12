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
  const handleClick = (e) => {
    console.dir(e)
  }

  return (
    <>
      {interesting && (
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
            <Tr>
              <Td>1</Td>
              <Td>Crypto</Td>
              <Td>
                <Flex>
                  <Center>
                    <Avatar
                      size="xs"
                      src="https://www.iconpacks.net/icons/2/free-icon-binance-coin-2211.png"
                    />
                  </Center>
                  <Square ml="2">
                    <Text size="md" fontWeight="bold">
                      Binance
                    </Text>
                  </Square>
                </Flex>
              </Td>
              <Td>
                <Flex>
                  <Center>
                    <AvatarGroup size="xs" max={2}>
                      <Avatar
                        name="BNB"
                        src="https://www.iconpacks.net/icons/2/free-icon-binance-coin-2211.png"
                      />
                      <Avatar
                        size="xs"
                        name="USDT"
                        src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/1024/Tether-USDT-icon.png"
                      />
                    </AvatarGroup>
                  </Center>
                  <Square ml="2">
                    <Text size="md" fontWeight="bold">
                      BNB/USDT
                    </Text>
                  </Square>
                </Flex>
              </Td>
              <Td isNumeric>25.4</Td>
              <Td isNumeric>-2.0%</Td>
              <Td>2022-01-01 11:11:00</Td>
              <Td>
                <ButtonIconReload handleClick={handleClick} />
              </Td>
            </Tr>
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
    </>
  )
}

export default TableView
